<?php

namespace App\Http\Controllers;

use App\Models\AktaKelahiran;
use App\Models\AktaKematian;
use App\Models\Ktp;
use App\Models\Penduduk;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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

    public function addPengajuanktp()
    {
        // tabel penduduk untuk pilih penduduk yg mengajukan
        return view('admin.pengajuanKtp.add', [
            'title' => 'Pengajuan'
        ]);
    }

    public function storePengajuanKtp(Request $request)
    {
        $validatedData = $request->validate([
            'id_penduduk' => 'required',
            'nama_pend' => 'required',
            'jns_kel_pend' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required',
            'agama' => 'required',
            'status_pernikahan' => 'required',
            'pekerjaan' => 'required',
            'kewarganegaraan' => 'required',
            'dok_fc_kk' => 'required|file|max:1024',
        ]);
        $usia = Carbon::parse($request->tgl_lahir)->age;
        $validatedData['usia'] = $usia;
        $validatedData['tgl_pengajuan'] = Carbon::now()->format('Y-m-d');
        $validatedData['dok_fc_kk'] = $request->file('dok_fc_kk')->store('dokumen-pengajuan-ktp');
        $validatedData['keterangan'] = $request->keterangan;
        $validatedData['catatan'] = NULL;
        $validatedData['status'] = 0;
        Ktp::create($validatedData);
        Alert::success('Berhasil!', 'Pengajuan KTP Baru telah ditambahkan');
        return redirect()->route('admin-pengajuanKtp');
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

    public function editPengajuanKtp($id)
    {
        $pengajuanKtp = DB::table('kartu_tanda_penduduk')->where('id', $id)->get();
        return view('admin.pengajuanKtp.edit', [
            'title' => 'Pengajuan',
            'ktp' => $pengajuanKtp
        ]);
    }

    public function updatePengajuanKtp($id, Request $request)
    {
        $validatedData = $request->validate([
            'nama_pend' => 'required',
            'jns_kel_pend' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required',
            'agama' => 'required',
            'status_pernikahan' => 'required',
            'pekerjaan' => 'required',
            'kewarganegaraan' => 'required',
            'dok_fc_kk' => 'file|max:1024',
        ]);
        if ($request->file('dok_fc_kk')) {
            $validatedData['dok_fc_kk'] = $request->file('dok_fc_kk')->store('dokumen-pengajuan-ktp');
        }
        $validatedData['keterangan'] = $request->keterangan;
        $validatedData['status'] = 0;

        Ktp::where('id', $id)
            ->update($validatedData);
        Alert::success('Success', 'Pengajuan berhasil diupdate!');
        return redirect()->route('pend-pengajuanKtp');
    }

    public function processPengajuanKtp($id, Request $request)
    {
        $validatedData['status'] = $request->status;
        $validatedData['catatan'] = $request->catatan;
        Ktp::where('id', $id)->update($validatedData);
        Alert::success('Success', 'Pengajuan Ktp telah diproses!');
        return redirect()->route('admin-pengajuanKtp');
    }

    public function destroyPengajuanKtp($id)
    {
        $pengajuanKtp = DB::table('kartu_tanda_penduduk')->where('id', $id)->get();
        Storage::delete($pengajuanKtp[0]->dok_fc_kk);
        Ktp::where('id', $id)->delete();
        Alert::success('Success', 'Pengajuan berhasil dihapus!');
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
    public function addPengajuanAktaKelahiran()
    {
        return view('admin.pengajuanAktaKelahiran.add', [
            'title' => 'Pengajuan'
        ]);
    }

    public function storePengajuanAktaKelahiran(Request $request)
    {
        // get user id penduduk
        $id_penduduk = auth()->user()->id_penduduk;
        $validatedData = $request->validate([
            'nama_anak' => 'required',
            'anak_ke' => 'required',
            'jns_kel_anak' => 'required',
            'tmp_lahir_anak' => 'required',
            'tgl_lahir_anak' => 'required|date',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'dok_surat_ket_lahir' => 'required|file|max:1024',
            'dok_fc_akta_nikah_ortu' => 'required|file|max:1024',
            'dok_fc_kk' => 'required|file|max:1024',
            'dok_fc_ktp_suami_istri' => 'required|file|max:1024',
            'dok_fc_ktp_saksi' => 'required|file|max:1024',
            'dok_fc_ijazah' => 'file|max:1024',
            'dok_surat_ket_sekolah' => 'file|max:1024',
            'dok_akta_anak_sebelumnya' => 'file|max:1024',
            'dok_surat_ket_kematian' => 'file|max:1024',
        ]);
        $validatedData['id_penduduk'] = $id_penduduk;
        $validatedData['tgl_pengajuan'] = Carbon::now()->format('Y-m-d');
        $validatedData['dok_surat_ket_lahir'] = $request->file('dok_surat_ket_lahir')->store('dokumen-pengajuan-aktaKelahiran');
        $validatedData['dok_fc_akta_nikah_ortu'] = $request->file('dok_fc_akta_nikah_ortu')->store('dokumen-pengajuan-aktaKelahiran');
        $validatedData['dok_fc_kk'] = $request->file('dok_fc_kk')->store('dokumen-pengajuan-aktaKelahiran');
        $validatedData['dok_fc_ktp_suami_istri'] = $request->file('dok_fc_ktp_suami_istri')->store('dokumen-pengajuan-aktaKelahiran');
        $validatedData['dok_fc_ktp_saksi'] = $request->file('dok_fc_ktp_saksi')->store('dokumen-pengajuan-aktaKelahiran');
        // not required doc
        if ($request->file('dok_fc_ijazah')) {
            $validatedData['dok_fc_ijazah'] = $request->file('dok_fc_ijazah')->store('dokumen-pengajuan-aktaKelahiran');
        }
        if ($request->file('dok_surat_ket_sekolah')) {
            $validatedData['dok_surat_ket_sekolah'] = $request->file('dok_surat_ket_sekolah')->store('dokumen-pengajuan-aktaKelahiran');
        }
        if ($request->file('dok_akta_anak_sebelumnya')) {
            $validatedData['dok_akta_anak_sebelumnya'] = $request->file('dok_akta_anak_sebelumnya')->store('dokumen-pengajuan-aktaKelahiran');
        }
        if ($request->file('dok_surat_ket_kematian')) {
            $validatedData['dok_surat_ket_kematian'] = $request->file('dok_surat_ket_kematian')->store('dokumen-pengajuan-aktaKelahiran');
        }
        $validatedData['keterangan'] = $request->keterangan;
        $validatedData['catatan'] = NULL;
        $validatedData['status'] = 0;
        AktaKelahiran::create($validatedData);
        Alert::success('Berhasil!', 'Pengajuan Akta Kelahiran Baru telah ditambahkan');
        return redirect()->route('admin-pengajuanAkl');
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
    public function editPengajuanAktaKelahiran($id)
    {
        $pengajuanAkl = DB::table('akta_kelahiran')->where('id', $id)->get();
        return view('admin.pengajuanAktaKelahiran.edit', [
            'title' => 'Pengajuan',
            'akl' => $pengajuanAkl
        ]);
    }
    public function updatePengajuanAktaKelahiran(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_anak' => 'required',
            'anak_ke' => 'required',
            'jns_kel_anak' => 'required',
            'tmp_lahir_anak' => 'required',
            'tgl_lahir_anak' => 'required|date',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'dok_surat_ket_lahir' => 'file|max:1024',
            'dok_fc_akta_nikah_ortu' => 'file|max:1024',
            'dok_fc_kk' => 'file|max:1024',
            'dok_fc_ktp_suami_istri' => 'file|max:1024',
            'dok_fc_ktp_saksi' => 'file|max:1024',
            'dok_fc_ijazah' => 'file|max:1024',
            'dok_surat_ket_sekolah' => 'file|max:1024',
            'dok_akta_anak_sebelumnya' => 'file|max:1024',
            'dok_surat_ket_kematian' => 'file|max:1024',
        ]);
        $validatedData['tgl_pengajuan'] = Carbon::now()->format('Y-m-d');
        if ($request->file('dok_surat_ket_lahir')) {
            $validatedData['dok_surat_ket_lahir'] = $request->file('dok_surat_ket_lahir')->store('dokumen-pengajuan-aktaKelahiran');
        }
        if ($request->file('dok_fc_akta_nikah_ortu')) {
            $validatedData['dok_fc_akta_nikah_ortu'] = $request->file('dok_fc_akta_nikah_ortu')->store('dokumen-pengajuan-aktaKelahiran');
        }
        if ($request->file('dok_fc_kk')) {
            $validatedData['dok_fc_kk'] = $request->file('dok_fc_kk')->store('dokumen-pengajuan-aktaKelahiran');
        }
        if ($request->file('dok_fc_ktp_suami_istri')) {
            $validatedData['dok_fc_ktp_suami_istri'] = $request->file('dok_fc_ktp_suami_istri')->store('dokumen-pengajuan-aktaKelahiran');
        }
        if ($request->file('dok_fc_ktp_saksi')) {
            $validatedData['dok_fc_ktp_saksi'] = $request->file('dok_fc_ktp_saksi')->store('dokumen-pengajuan-aktaKelahiran');
        }
        if ($request->file('dok_fc_ijazah')) {
            $validatedData['dok_fc_ijazah'] = $request->file('dok_fc_ijazah')->store('dokumen-pengajuan-aktaKelahiran');
        }
        if ($request->file('dok_surat_ket_sekolah')) {
            $validatedData['dok_surat_ket_sekolah'] = $request->file('dok_surat_ket_sekolah')->store('dokumen-pengajuan-aktaKelahiran');
        }
        if ($request->file('dok_akta_anak_sebelumnya')) {
            $validatedData['dok_akta_anak_sebelumnya'] = $request->file('dok_akta_anak_sebelumnya')->store('dokumen-pengajuan-aktaKelahiran');
        }
        if ($request->file('dok_surat_ket_kematian')) {
            $validatedData['dok_surat_ket_kematian'] = $request->file('dok_surat_ket_kematian')->store('dokumen-pengajuan-aktaKelahiran');
        }
        $validatedData['keterangan'] = $request->keterangan;
        $validatedData['status'] = 0;

        AktaKelahiran::where('id', $id)
            ->update($validatedData);
        Alert::success('Success', 'Pengajuan berhasil diupdate!');
        return redirect()->route('admin-pengajuanAkl');
    }
    public function destroyPengajuanAktaKelahiran($id)
    {
        $pengajuanAkl = DB::table('akta_kelahiran')->where('id', $id)->get();
        Storage::delete([
            $pengajuanAkl[0]->dok_surat_ket_lahir,
            $pengajuanAkl[0]->dok_fc_akta_nikah_ortu,
            $pengajuanAkl[0]->dok_fc_kk,
            $pengajuanAkl[0]->dok_fc_ktp_suami_istri,
            $pengajuanAkl[0]->dok_fc_ktp_saksi,
            // $pengajuanAkl[0]->dok_fc_ijazah,
            // $pengajuanAkl[0]->dok_surat_ket_sekolah,
            // $pengajuanAkl[0]->dok_akta_anak_sblmnya,
            // $pengajuanAkl[0]->dok_surat_ket_kematian,
        ]);
        AktaKelahiran::where('id', $id)->delete();
        Alert::success('Success', 'Pengajuan berhasil dihapus!');
        return redirect()->route('admin-pengajuanAkl');
    }
    // end pengajuan Akta Kelahiran

    // pengajuan Akta Kematian
    public function pengajuanAktaKematian()
    {
        $pengajuanAkm = DB::table('akta_kematian')
            ->join('penduduk', 'akta_kematian.id_penduduk', 'penduduk.id')
            ->select('akta_kematian.*', 'penduduk.nama')
            ->get();
        return view('admin.pengajuanAktaKematian.index', [
            'title' => 'Pengajuan',
            'pengajuanAkm' => $pengajuanAkm
        ]);
    }
    public function showPengajuanAktaKematian($id)
    {
        $pengajuanAkm = DB::table('akta_kematian')
            ->join('penduduk', 'akta_kematian.id_penduduk', 'penduduk.id')
            ->select('akta_kematian.*', 'penduduk.nama')
            ->where('akta_kematian.id', $id)
            ->get();
        return view('admin.pengajuanAktaKematian.show', [
            'title' => 'Pengajuan',
            'akm' => $pengajuanAkm
        ]);
    }
    public function processPengajuanAktaKematian($id, Request $request)
    {
        $validatedData['status'] = $request->status;
        $validatedData['catatan'] = $request->catatan;
        AktaKematian::where('id', $id)->update($validatedData);
        Alert::success('Success', 'Pengajuan Akta Kematian telah diproses!');
        return redirect()->route('admin-pengajuanAktaKematian');
    }
    public function editPengajuanAktaKematian($id)
    {
        $pengajuanAkm = DB::table('akta_kematian')->where('id', $id)->get();
        return view('admin.pengajuanAktaKematian.edit', [
            'title' => 'Pengajuan',
            'akm' => $pengajuanAkm
        ]);
    }
    public function updatePengajuanAktaKematian(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_alm_pend' => 'required',
            'jns_kel_alm' => 'required',
            'tmp_lahir_alm' => 'required',
            'tgl_lahir_alm' => 'required|date',
            'tgl_meninggal' => 'required|date',
            'dok_surat_ket_kematian' => 'file|max:1024',
            'dok_akta_kel_suami_istri' => 'file|max:1024',
            'dok_fc_ktp_alm' => 'file|max:1024',
            'dok_fc_akta_kel_alm' => 'file|max:1024',
            'dok_fc_ktp_ahli_waris' => 'file|max:1024',
            'dok_fc_kk' => 'file|max:1024',
            'dok_fc_ktp_saksi' => 'file|max:1024',
        ]);
        $validatedData['tgl_pengajuan'] = Carbon::now()->format('Y-m-d');
        if ($request->file('dok_surat_ket_kematian')) {
            $validatedData['dok_surat_ket_kematian'] = $request->file('dok_surat_ket_kematian')->store('dokumen-pengajuan-aktaKematian');
        }
        if ($request->file('dok_akta_kel_suami_istri')) {
            $validatedData['dok_akta_kel_suami_istri'] = $request->file('dok_akta_kel_suami_istri')->store('dokumen-pengajuan-aktaKematian');
        }
        if ($request->file('dok_fc_ktp_alm')) {
            $validatedData['dok_fc_ktp_alm'] = $request->file('dok_fc_ktp_alm')->store('dokumen-pengajuan-aktaKematian');
        }
        if ($request->file('dok_fc_akta_kel_alm')) {
            $validatedData['dok_fc_akta_kel_alm'] = $request->file('dok_fc_akta_kel_alm')->store('dokumen-pengajuan-aktaKematian');
        }
        if ($request->file('dok_fc_ktp_ahli_waris')) {
            $validatedData['dok_fc_ktp_ahli_waris'] = $request->file('dok_fc_ktp_ahli_waris')->store('dokumen-pengajuan-aktaKematian');
        }
        if ($request->file('dok_fc_kk')) {
            $validatedData['dok_fc_kk'] = $request->file('dok_fc_kk')->store('dokumen-pengajuan-aktaKematian');
        }
        if ($request->file('dok_fc_ktp_saksi')) {
            $validatedData['dok_fc_ktp_saksi'] = $request->file('dok_fc_ktp_saksi')->store('dokumen-pengajuan-aktaKematian');
        }
        $validatedData['keterangan'] = $request->keterangan;
        $validatedData['catatan'] = NULL;
        $validatedData['status'] = 0;

        AktaKematian::where('id', $id)
            ->update($validatedData);
        Alert::success('Success', 'Pengajuan berhasil diupdate!');
        return redirect()->route('admin-pengajuanAkm');
    }
    public function destroyPengajuanAktaKematian($id)
    {
        $pengajuanAkm = DB::table('akta_kematian')->where('id', $id)->get();
        Storage::delete([
            $pengajuanAkm[0]->dok_surat_ket_kematian,
            $pengajuanAkm[0]->dok_akta_kel_suami_istri,
            $pengajuanAkm[0]->dok_fc_ktp_alm,
            $pengajuanAkm[0]->dok_fc_akta_kel_alm,
            $pengajuanAkm[0]->dok_fc_ktp_ahli_waris,
            $pengajuanAkm[0]->dok_fc_kk,
            $pengajuanAkm[0]->dok_fc_ktp_saksi
        ]);
        AktaKematian::where('id', $id)->delete();
        Alert::success('Success', 'Pengajuan berhasil dihapus!');
        return redirect()->route('admin-pengajuanAkm');
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
