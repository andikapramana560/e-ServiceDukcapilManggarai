<?php

namespace App\Http\Controllers;

use App\Models\AktaKelahiran;
use App\Models\Ktp;
use App\Models\Penduduk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'title' => 'Dashboard'
        ]);
    }

    // penduduk 
    public function penduduk()
    {
        $penduduk = DB::table('penduduk')
            ->join('users', 'penduduk.id', 'users.id_penduduk')
            ->select('penduduk.*', 'users.status_aktivasi')
            ->get();
        return view('admin.penduduk.index', [
            'title' => 'Penduduk',
            'penduduk' => $penduduk
        ]);
    }

    public function addPenduduk()
    {
        return view('admin.penduduk.add', [
            'title' => 'Penduduk'
        ]);
    }

    public function storePenduduk(Request $request)
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
        $validatedDataUser['status_aktivasi'] = '1';
        User::create($validatedDataUser);
        Alert::success('Success', 'Penduduk baru berhasil ditambahkan!');
        return redirect()->route('admin-penduduk');
    }

    public function showPenduduk($id)
    {
        $penduduk = DB::table('penduduk')
            ->join('users', 'penduduk.id', 'users.id_penduduk')
            ->select('penduduk.*', 'users.*')
            ->where('penduduk.id', $id)
            ->get();
        return view('admin.penduduk.show', [
            'title' => 'Penduduk',
            'penduduk' => $penduduk
        ]);
    }

    public function activatePenduduk($id)
    {
        User::where('id_penduduk', $id)->update(['status_aktivasi' => 1]);
        Alert::success('Success', 'User penduduk telah diaktifkan!');
        return redirect()->route('admin-penduduk');
    }

    public function editPenduduk($id)
    {
        $penduduk = DB::table('penduduk')
            ->join('users', 'penduduk.id', 'users.id_penduduk')
            ->select('penduduk.*', 'users.*')
            ->where('penduduk.id', $id)
            ->get();
        return view('admin.penduduk.edit', [
            'title' => 'Penduduk',
            'penduduk' => $penduduk
        ]);
    }

    public function updatePenduduk(Request $request, $id)
    {
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

    public function destroyPenduduk($id)
    {
        Penduduk::where('id', $id)->delete();
        User::where('id_penduduk', $id)->delete();
        Alert::success('Success', 'Data penduduk berhasil dihapus!');
        return redirect()->route('admin-penduduk');
    }
    // end penduduk

    // pengajuan ktp
    public function pengajuanKtp()
    {
        $pengajuanKtp = DB::table('kartu_tanda_penduduk')
            ->join('penduduk', 'kartu_tanda_penduduk.id_penduduk', 'penduduk.id')
            ->select('kartu_tanda_penduduk.*', 'penduduk.nama')
            ->get();
        return view('admin.pengajuanKtp.index', [
            'title' => 'Pengajuan',
            'pengajuanktp' => $pengajuanKtp
        ]);
    }

    public function showPengajuanKtp($id)
    {
        $pengajuanKtp = DB::table('kartu_tanda_penduduk')
            ->join('penduduk', 'kartu_tanda_penduduk.id_penduduk', 'penduduk.id')
            ->select('kartu_tanda_penduduk.*', 'penduduk.nama')
            ->where('kartu_tanda_penduduk.id', $id)
            ->get();
        return view('admin.pengajuanKtp.show', [
            'title' => 'Pengajuan',
            'ktp' => $pengajuanKtp
        ]);
    }

    public function processPengajuanKtp($id, Request $request)
    {
        $validatedData['status'] = $request->status;
        $validatedData['catatan'] = $request->catatan;
        Ktp::where('id', $id)->update($validatedData);
        Alert::success('Success', 'Pengajuan Ktp telah diproses!');
        return redirect()->route('admin-pengajuanKtp');
    }
    // end pengajuan ktp

    // pengajuan Akta Kelahiran
    public function pengajuanAktaKelahiran()
    {
        $pengajuanAkl = DB::table('akta_kelahiran')
            ->join('penduduk', 'akta_kelahiran.id_penduduk', 'penduduk.id')
            ->select('akta_kelahiran.*', 'penduduk.nama')
            ->get();
        return view('admin.pengajuanAktaKelahiran.index', [
            'title' => 'Pengajuan',
            'pengajuanAkl' => $pengajuanAkl
        ]);
    }
    public function showPengajuanAktaKelahiran($id)
    {
        $pengajuanAkl = DB::table('akta_kelahiran')
            ->join('penduduk', 'akta_kelahiran.id_penduduk', 'penduduk.id')
            ->select('akta_kelahiran.*', 'penduduk.nama')
            ->where('akta_kelahiran.id', $id)
            ->get();
        return view('admin.pengajuanAktaKelahiran.show', [
            'title' => 'Pengajuan',
            'akl' => $pengajuanAkl
        ]);
    }
    public function processPengajuanAktaKelahiran($id, Request $request)
    {
        $validatedData['status'] = $request->status;
        $validatedData['catatan'] = $request->catatan;
        AktaKelahiran::where('id', $id)->update($validatedData);
        Alert::success('Success', 'Pengajuan Akta Kelahiran telah diproses!');
        return redirect()->route('admin-pengajuanAktaKelahiran');
    }
    // end pengajuan Akta Kelahiran

    // pengajuan Akta Kematian
    public function pengajuanAktaKematian()
    {
        return view('admin.pengajuanAktaKematian.index', [
            'title' => 'Pengajuan',
        ]);
    }
    public function showPengajuanAktaKematian()
    {
    }
    public function processPengajuanAktaKematian()
    {
    }
    // end pengajuan Akta Kematian

    // pengajuan KK
    public function pengajuanKk()
    {
        return view('admin.pengajuanKk.index', [
            'title' => 'Pengajuan',
        ]);
    }
    public function showPengajuanKk()
    {
    }
    public function showAnggotaKeluarga()
    {
    }
    public function processKk()
    {
    }
    // end pengajuan KK
}
