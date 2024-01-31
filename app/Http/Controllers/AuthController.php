<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function registerAdm()
    {
        return view('auth.registerAdm');
    }

    public function storeRegisterAdm(Request $request)
    {
        $validatedDataUser = $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:255',
        ]);
        $validatedDataUser['password'] = Hash::make($validatedDataUser['password']);
        $validatedDataUser['role'] = '0';
        $validatedDataUser['id_penduduk'] = '0';
        $validatedDataUser['status_aktivasi'] = '1';
        User::create($validatedDataUser);
        return redirect('/')->with('success', 'Registrasi berhasil!');
    }

    public function registerMsy()
    {
        return view('auth.registerMsy');
    }

    public function storeRegisterMsy(Request $request)
    {
        $validatedDataUser = $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:255',
        ]);
        $validatedDataUser['password'] = Hash::make($validatedDataUser['password']);
        $validatedDataUser['role'] = '1';
        // create data penduduk first then create data user
        $validatedDataPenduduk = $request->validate([
            'nik' => 'required|max:16|unique:penduduk',
            'nama' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required',
            'jns_kelamin' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'kewarganegaraan' => 'required',
        ]);
        $id_penduduk = Penduduk::insertGetId($validatedDataPenduduk);
        $validatedDataUser['id_penduduk'] = $id_penduduk; 
        $validatedDataUser['status_aktivasi'] = '0';
        User::create($validatedDataUser);
        Alert::success('Success', 'Berhasil Mendaftar, Mohon tunggu konfirmasi!');
        return redirect('/')->with('success', 'Registrasi berhasil!');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password'], 'role' => '0', 'status_aktivasi' => '1'])) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        } elseif (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password'], 'role' => '1', 'status_aktivasi' => '1'])) {
            $request->session()->regenerate();
            return redirect()->intended('/masyarakat/dashboard');
        } else {
            Alert::error('error', 'Login Gagal!');
            return back()->with('error', 'Login Gagal!');
        }
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
