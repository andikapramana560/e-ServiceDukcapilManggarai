<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard', [
            'title' => 'Dashboard'
        ]);
    }

    // penduduk 
    public function penduduk(){
        $penduduk = DB::table('penduduk')
                        ->join('users', 'penduduk.id', 'users.id_penduduk')
                        ->select('penduduk.*', 'users.status_aktivasi')
                        ->get();
        return view('admin.penduduk', [
            'title' => 'Penduduk',
            'penduduk' => $penduduk
        ]);
    }

    public function addPenduduk(){
        return view('admin.addPenduduk', [
            'title' => 'Penduduk'
        ]);
    }

    public function storePenduduk(Request $request){
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
        $validatedDataUser['status_aktivasi'] = '1';
        User::create($validatedDataUser);
        Alert::success('Success', 'Penduduk baru berhasil ditambahkan!');
        return redirect()->route('admin-penduduk');
    }

    public function showPenduduk($id){
        $penduduk = DB::table('penduduk')
                        ->join('users', 'penduduk.id', 'users.id_penduduk')
                        ->select('penduduk.*', 'users.*')
                        ->where('penduduk.id', $id)
                        ->get();
        return view('admin.showPenduduk', [
            'title' => 'Penduduk',
            'penduduk' => $penduduk
        ]);
    }

    public function activatePenduduk($id){
        User::where('id_penduduk', $id)->update(['status_aktivasi' => 1]);
        Alert::success('Success', 'User penduduk telah diaktifkan!');
        return redirect()->route('admin-penduduk');
    }

    public function editPenduduk($id){
        $penduduk = DB::table('penduduk')
                        ->join('users', 'penduduk.id', 'users.id_penduduk')
                        ->select('penduduk.*', 'users.*')
                        ->where('penduduk.id', $id)
                        ->get();
        return view('admin.editPenduduk', [
            'title' => 'Penduduk',
            'penduduk' => $penduduk
        ]);
    }

    public function updatePenduduk(Request $request, $id){
        $validatedDataUser = $request->validate([
            'email' => 'required|email|unique:users',
        ]);
        // create data penduduk first then create data user
        $validatedDataPenduduk = $request->validate([
            // 'nik' => 'required|max:16|unique:penduduk',
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
        Penduduk::where('id', $id)->update($validatedDataPenduduk);
        User::where('id_penduduk', $id)->update($validatedDataUser);
        Alert::success('Success', 'Data penduduk berhasil diupdate!');
        return redirect()->route('admin-penduduk');
    }

    public function destroyPenduduk($id){
        Penduduk::where('id', $id)->delete();
        User::where('id_penduduk', $id)->delete();
        Alert::success('Success', 'Data penduduk berhasil dihap;us!');
        return redirect()->route('admin-penduduk');
    }
    // end penduduk
}
