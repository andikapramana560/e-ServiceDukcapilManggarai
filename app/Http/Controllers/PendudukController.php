<?php

namespace App\Http\Controllers;

use App\Models\AktaKelahiran;
use App\Models\AktaKematian;
use App\Models\Ktp;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PendudukController extends Controller
{
    public function index()
    {
        return view('penduduk.dashboard', [
            'title' => 'Dashboard'
        ]);
    }

    // pengajuan ktp
    public function pengajuanKtp()
    {
        $id_penduduk = auth()->user()->id_penduduk;
        $pengajuanKtp = DB::table('kartu_tanda_penduduk')
            ->where('id_penduduk', $id_penduduk)
            ->get();
        return view('penduduk.pengajuanKtp.index', [
            'title' => 'Pengajuan',
            'pengajuanktp' => $pengajuanKtp
        ]);
    }

    public function addPengajuanktp()
    {
        return view('penduduk.pengajuanKtp.add', [
            'title' => 'Pengajuan'
        ]);
    }

    public function storePengajuanKtp(Request $request)
    {
        // get user id penduduk
        $id_penduduk = auth()->user()->id_penduduk;
        $validatedData = $request->validate([
            'jns_pengajuan' => 'required',
            'nama_pend' => 'required',
            'jns_kel_pend' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required',
            'agama' => 'required',
            'status_pernikahan' => 'required',
            'pekerjaan' => 'required',
            'kewarganegaraan' => 'required',
            // pengajuan 1
            'dok_fc_kk' => 'file|max:1024',
            // pengajuan 2
            'dok_fc_kk2' => 'file|max:1024',
            'dok_srt_ket_hilang' => 'file|max:1024',
            'dok_ktp_rusak' => 'file|max:1024',
            // pengajuan 3
            'dok_fc_kk3' => 'file|max:1024',
            'dok_ktp' => 'file|max:1024',
            // pengajuan 4
            'dok_fc_kk4' => 'file|max:1024',
            'dok_ktp2' => 'file|max:1024',
        ]);
        $validatedData['id_penduduk'] = $id_penduduk;
        $usia = Carbon::parse($request->tgl_lahir)->age;
        $validatedData['usia'] = $usia;
        $validatedData['tgl_pengajuan'] = Carbon::now()->format('Y-m-d');
        // pengajuan 1
        if ($request->file('dok_fc_kk')) {
            $validatedData['dok_fc_kk'] = $request->file('dok_fc_kk')->store('dokumen-pengajuan-ktp');
        }
        // pengajuan 2
        if ($request->file('dok_fc_kk2')) {
            $validatedData['dok_fc_kk2'] = $request->file('dok_fc_kk2')->store('dokumen-pengajuan-ktp');
        }
        if ($request->file('dok_srt_ket_hilang')) {
            $validatedData['dok_srt_ket_hilang'] = $request->file('dok_srt_ket_hilang')->store('dokumen-pengajuan-ktp');
        }
        if ($request->file('dok_ktp_rusak')) {
            $validatedData['dok_ktp_rusak'] = $request->file('dok_ktp_rusak')->store('dokumen-pengajuan-ktp');
        }
        // pengajuan 3
        if ($request->file('dok_fc_kk3')) {
            $validatedData['dok_fc_kk3'] = $request->file('dok_fc_kk3')->store('dokumen-pengajuan-ktp');
        }
        if ($request->file('dok_ktp')) {
            $validatedData['dok_ktp'] = $request->file('dok_ktp')->store('dokumen-pengajuan-ktp');
        }
        // pengajuan 4
        if ($request->file('dok_fc_kk4')) {
            $validatedData['dok_fc_kk4'] = $request->file('dok_fc_kk4')->store('dokumen-pengajuan-ktp');
        }
        if ($request->file('dok_ktp2')) {
            $validatedData['dok_ktp2'] = $request->file('dok_ktp2')->store('dokumen-pengajuan-ktp');
        }
        $validatedData['keterangan'] = $request->keterangan;
        $validatedData['catatan'] = NULL;
        $validatedData['status'] = 0;
        Ktp::create($validatedData);
        Alert::success('Berhasil!', 'Pengajuan KTP Baru telah ditambahkan');
        return redirect()->route('pend-pengajuanKtp');
    }

    public function showPengajuanKtp($id)
    {
        $pengajuanKtp = DB::table('kartu_tanda_penduduk')->where('id', $id)->get();
        return view('penduduk.pengajuanKtp.show', [
            'title' => 'Pengajuan',
            'ktp' => $pengajuanKtp
        ]);
    }

    public function editPengajuanKtp($id)
    {
        $pengajuanKtp = DB::table('kartu_tanda_penduduk')->where('id', $id)->get();
        return view('penduduk.pengajuanKtp.edit', [
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
            // pengajuan 1
            'dok_fc_kk' => 'file|max:1024',
            // pengajuan 2
            'dok_fc_kk2' => 'file|max:1024',
            'dok_srt_ket_hilang' => 'file|max:1024',
            'dok_ktp_rusak' => 'file|max:1024',
            // pengajuan 3
            'dok_fc_kk3' => 'file|max:1024',
            'dok_ktp' => 'file|max:1024',
            // pengajuan 4
            'dok_fc_kk4' => 'file|max:1024',
            'dok_ktp2' => 'file|max:1024',
        ]);
        // pengajuan 1
        if ($request->file('dok_fc_kk')) {
            $validatedData['dok_fc_kk'] = $request->file('dok_fc_kk')->store('dokumen-pengajuan-ktp');
        }
        // pengajuan 2
        if ($request->file('dok_fc_kk2')) {
            $validatedData['dok_fc_kk2'] = $request->file('dok_fc_kk2')->store('dokumen-pengajuan-ktp');
        }
        if ($request->file('dok_srt_ket_hilang')) {
            $validatedData['dok_srt_ket_hilang'] = $request->file('dok_srt_ket_hilang')->store('dokumen-pengajuan-ktp');
        }
        if ($request->file('dok_ktp_rusak')) {
            $validatedData['dok_ktp_rusak'] = $request->file('dok_ktp_rusak')->store('dokumen-pengajuan-ktp');
        }
        // pengajuan 3
        if ($request->file('dok_fc_kk3')) {
            $validatedData['dok_fc_kk3'] = $request->file('dok_fc_kk3')->store('dokumen-pengajuan-ktp');
        }
        if ($request->file('dok_ktp')) {
            $validatedData['dok_ktp'] = $request->file('dok_ktp')->store('dokumen-pengajuan-ktp');
        }
        // pengajuan 4
        if ($request->file('dok_fc_kk4')) {
            $validatedData['dok_fc_kk4'] = $request->file('dok_fc_kk4')->store('dokumen-pengajuan-ktp');
        }
        if ($request->file('dok_ktp2')) {
            $validatedData['dok_ktp2'] = $request->file('dok_ktp2')->store('dokumen-pengajuan-ktp');
        }
        $validatedData['keterangan'] = $request->keterangan;
        $validatedData['status'] = 0;

        Ktp::where('id', $id)
            ->update($validatedData);
        Alert::success('Success', 'Pengajuan berhasil diupdate!');
        return redirect()->route('pend-pengajuanKtp');
    }

    public function destroyPengajuanKtp($id)
    {
        Ktp::where('id', $id)->delete();
        Alert::success('Success', 'Pengajuan berhasil dihapus!');
        return redirect()->route('pend-pengajuanKtp');
    }

    // pengajuan kk
    // public function pengajuanKk()
    // {
    //     return view('penduduk.pengajuanKk.index', [
    //         'title' => 'Pengajuan'
    //     ]);
    // }

    // public function addPengajuanKk()
    // {
    //     return view('penduduk.pengajuanKk.add', [
    //         'title' => 'Pengajuan'
    //     ]);
    // }

    // public function storePengajuanKk(Request $request)
    // {
    //     // get user id penduduk
    //     $id_penduduk = auth()->user()->id;
    //     $validatedData = $request->validate([
    //         'nama_kk' => 'required',
    //         'nik_kk' => 'required|max:16',
    //         'jns_kel_kk' => 'required',
    //         'tmp_lahir_kk' => 'required',
    //         'tgl_lahir_kk' => 'required|date',
    //         'agama_kk' => 'required',
    //         'pendidikan_kk' => 'required',
    //         'pekerjaan_kk' => 'required',
    //         'gol_darah_kk' => 'required',
    //         'status_pernikahan_kk' => 'required',
    //         'tgl_pernikahan_kk' => 'required|date',
    //         'stts_hub_klrg_kk' => 'required',
    //         'kewarganegaraan_kk' => 'required',
    //         'dok_imigrasi_kk' => 'required',
    //         'nama_ayah_kk' => 'required',
    //         'nama_ibu_kk' => 'required',
    //         'dok_ijin_tinggal' => 'required|file|max:1024',
    //         'dok_akta_nikah' => 'required|file|max:1024',
    //         'dok_fc_ktp' => 'required|file|max:1024',
    //         'dok_fc_data_pendukung' => 'required|file|max:1024',
    //         'dok_surat_pernyataan' => 'required|file|max:1024',
    //     ]);
    //     $validatedData['id_penduduk'] = $id_penduduk;
    //     $validatedData['tgl_pengajuan'] = Carbon::now()->format('Y-m-d');
    //     $validatedData['dok_ijin_tinggal'] = $request->file('dok_ijin_tinggal')->store('dokumen-pengajuan-kk');
    //     $validatedData['dok_akta_nikah'] = $request->file('dok_akta_nikah')->store('dokumen-pengajuan-kk');
    //     $validatedData['dok_fc_ktp'] = $request->file('dok_fc_ktp')->store('dokumen-pengajuan-kk');
    //     $validatedData['dok_fc_data_pendukung'] = $request->file('dok_fc_data_pendukung')->store('dokumen-pengajuan-kk');
    //     $validatedData['dok_surat_pernyataan'] = $request->file('dok_surat_pernyataan')->store('dokumen-pengajuan-kk');
    //     $validatedData['keterangan'] = $request->keterangan;
    //     $validatedData['status'] = 0;
    // }

    // public function showPengajuanKk($id)
    // {
    // }
    // public function destroyPengajuanKk($id)
    // {
    // }

    // anggota kk

    // pengajuan akta kelahiran
    public function pengajuanAktaKelahiran()
    {
        $id_penduduk = auth()->user()->id_penduduk;
        $pengajuanAkl = DB::table('akta_kelahiran')
            ->where('id_penduduk', $id_penduduk)
            ->get();
        return view('penduduk.pengajuanAktaKelahiran.index', [
            'title' => 'Pengajuan',
            'pengajuanAkl' => $pengajuanAkl
        ]);
    }

    public function addPengajuanAktaKelahiran()
    {
        return view('penduduk.pengajuanAktaKelahiran.add', [
            'title' => 'Pengajuan'
        ]);
    }

    public function storePengajuanAktaKelahiran(Request $request)
    {
        // get user id penduduk
        $id_penduduk = auth()->user()->id_penduduk;
        $validatedData = $request->validate([
            'jns_pengajuan' => 'required',
            'nama_anak' => 'required',
            'anak_ke' => 'required',
            'jns_kel_anak' => 'required',
            'tmp_lahir_anak' => 'required',
            'tgl_lahir_anak' => 'required|date',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            // pengajuan 1
            'dok_surat_ket_lahir' => 'file|max:1024',
            'dok_fc_akta_nikah_ortu' => 'file|max:1024',
            'dok_fc_kk' => 'file|max:1024',
            'dok_fc_ktp_suami_istri' => 'file|max:1024',
            'dok_fc_ktp_saksi' => 'file|max:1024',
            'dok_fc_ijazah' => 'file|max:1024',
            'dok_surat_ket_sekolah' => 'file|max:1024',
            'dok_akta_anak_sebelumnya' => 'file|max:1024',
            'dok_surat_ket_kematian' => 'file|max:1024',
            // pengajuan 2
            'dok_surat_ket_hilang' => 'file|max:1024',
            'dok_fc_akta_hilang' => 'file|max:1024',
            'dok_fc_kk_terbaru' => 'file|max:1024',
            'dok_fc_ktp_suami_istri2' => 'file|max:1024',
            'dok_fc_ktp_saksi2' => 'file|max:1024',
            // pengajuan 3
            'dok_akta_asli' => 'file|max:1024',
            'dok_ktp' => 'file|max:1024',
            'dok_kk2' => 'file|max:1024',
            'dok_ijazah' => 'file|max:1024',
            'dok_fc_ktp_saksi3' => 'file|max:1024',
        ]);
        $validatedData['id_penduduk'] = $id_penduduk;
        $validatedData['tgl_pengajuan'] = Carbon::now()->format('Y-m-d');
        // pengajuan 1
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
        // pengajuan 2
        if ($request->file('dok_surat_ket_hilang')) {
            $validatedData['dok_surat_ket_hilang'] = $request->file('dok_surat_ket_hilang')->store('dokumen-pengajuan-aktaKelahiran');
        }
        if ($request->file('dok_fc_akta_hilang')) {
            $validatedData['dok_fc_akta_hilang'] = $request->file('dok_fc_akta_hilang')->store('dokumen-pengajuan-aktaKelahiran');
        }
        if ($request->file('dok_fc_kk_terbaru')) {
            $validatedData['dok_fc_kk_terbaru'] = $request->file('dok_fc_kk_terbaru')->store('dokumen-pengajuan-aktaKelahiran');
        }
        if ($request->file('dok_fc_ktp_suami_istri2')) {
            $validatedData['dok_fc_ktp_suami_istri2'] = $request->file('dok_fc_ktp_suami_istri2')->store('dokumen-pengajuan-aktaKelahiran');
        }
        if ($request->file('dok_fc_ktp_saksi2')) {
            $validatedData['dok_fc_ktp_saksi2'] = $request->file('dok_fc_ktp_saksi2')->store('dokumen-pengajuan-aktaKelahiran');
        }
        // pengajuan 3
        if ($request->file('dok_akta_asli')) {
            $validatedData['dok_akta_asli'] = $request->file('dok_akta_asli')->store('dokumen-pengajuan-aktaKelahiran');
        }
        if ($request->file('dok_ktp')) {
            $validatedData['dok_ktp'] = $request->file('dok_ktp')->store('dokumen-pengajuan-aktaKelahiran');
        }
        if ($request->file('dok_kk2')) {
            $validatedData['dok_kk2'] = $request->file('dok_kk2')->store('dokumen-pengajuan-aktaKelahiran');
        }
        if ($request->file('dok_ijazah')) {
            $validatedData['dok_ijazah'] = $request->file('dok_ijazah')->store('dokumen-pengajuan-aktaKelahiran');
        }
        if ($request->file('dok_fc_ktp_saksi3')) {
            $validatedData['dok_fc_ktp_saksi3'] = $request->file('dok_fc_ktp_saksi3')->store('dokumen-pengajuan-aktaKelahiran');
        }
        $validatedData['keterangan'] = $request->keterangan;
        $validatedData['catatan'] = NULL;
        $validatedData['status'] = 0;
        AktaKelahiran::create($validatedData);
        Alert::success('Berhasil!', 'Pengajuan Akta Kelahiran Baru telah ditambahkan');
        return redirect()->route('pend-pengajuanAkl');
    }

    public function showPengajuanAktaKelahiran($id)
    {
        $pengajuanAkl = DB::table('akta_kelahiran')->where('id', $id)->get();
        return view('penduduk.pengajuanAktaKelahiran.show', [
            'title' => 'Pengajuan',
            'akl' => $pengajuanAkl
        ]);
    }
    public function editPengajuanAktaKelahiran($id)
    {
        $pengajuanAkl = DB::table('akta_kelahiran')->where('id', $id)->get();
        return view('penduduk.pengajuanAktaKelahiran.edit', [
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
            // pengajuan 1
            'dok_surat_ket_lahir' => 'file|max:1024',
            'dok_fc_akta_nikah_ortu' => 'file|max:1024',
            'dok_fc_kk' => 'file|max:1024',
            'dok_fc_ktp_suami_istri' => 'file|max:1024',
            'dok_fc_ktp_saksi' => 'file|max:1024',
            'dok_fc_ijazah' => 'file|max:1024',
            'dok_surat_ket_sekolah' => 'file|max:1024',
            'dok_akta_anak_sebelumnya' => 'file|max:1024',
            'dok_surat_ket_kematian' => 'file|max:1024',
            // pengajuan 2
            'dok_surat_ket_hilang' => 'file|max:1024',
            'dok_fc_akta_hilang' => 'file|max:1024',
            'dok_fc_kk_terbaru' => 'file|max:1024',
            'dok_fc_ktp_suami_istri2' => 'file|max:1024',
            'dok_fc_ktp_saksi2' => 'file|max:1024',
            // pengajuan 3
            'dok_akta_asli' => 'file|max:1024',
            'dok_ktp' => 'file|max:1024',
            'dok_kk2' => 'file|max:1024',
            'dok_ijazah' => 'file|max:1024',
            'dok_fc_ktp_saksi3' => 'file|max:1024',
        ]);
        // pengajuan 1
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
        // pengajuan 2
        if ($request->file('dok_surat_ket_hilang')) {
            $validatedData['dok_surat_ket_hilang'] = $request->file('dok_surat_ket_hilang')->store('dokumen-pengajuan-aktaKelahiran');
        }
        if ($request->file('dok_fc_akta_hilang')) {
            $validatedData['dok_fc_akta_hilang'] = $request->file('dok_fc_akta_hilang')->store('dokumen-pengajuan-aktaKelahiran');
        }
        if ($request->file('dok_fc_kk_terbaru')) {
            $validatedData['dok_fc_kk_terbaru'] = $request->file('dok_fc_kk_terbaru')->store('dokumen-pengajuan-aktaKelahiran');
        }
        if ($request->file('dok_fc_ktp_suami_istri2')) {
            $validatedData['dok_fc_ktp_suami_istri2'] = $request->file('dok_fc_ktp_suami_istri2')->store('dokumen-pengajuan-aktaKelahiran');
        }
        if ($request->file('dok_fc_ktp_saksi2')) {
            $validatedData['dok_fc_ktp_saksi2'] = $request->file('dok_fc_ktp_saksi2')->store('dokumen-pengajuan-aktaKelahiran');
        }
        // pengajuan 3
        if ($request->file('dok_akta_asli')) {
            $validatedData['dok_akta_asli'] = $request->file('dok_akta_asli')->store('dokumen-pengajuan-aktaKelahiran');
        }
        if ($request->file('dok_ktp')) {
            $validatedData['dok_ktp'] = $request->file('dok_ktp')->store('dokumen-pengajuan-aktaKelahiran');
        }
        if ($request->file('dok_kk2')) {
            $validatedData['dok_kk2'] = $request->file('dok_kk2')->store('dokumen-pengajuan-aktaKelahiran');
        }
        if ($request->file('dok_ijazah')) {
            $validatedData['dok_ijazah'] = $request->file('dok_ijazah')->store('dokumen-pengajuan-aktaKelahiran');
        }
        if ($request->file('dok_fc_ktp_saksi3')) {
            $validatedData['dok_fc_ktp_saksi3'] = $request->file('dok_fc_ktp_saksi3')->store('dokumen-pengajuan-aktaKelahiran');
        }
        $validatedData['keterangan'] = $request->keterangan;
        $validatedData['status'] = 0;

        AktaKelahiran::where('id', $id)
            ->update($validatedData);
        Alert::success('Success', 'Pengajuan berhasil diupdate!');
        return redirect()->route('pend-pengajuanAkl');
    }
    public function destroyPengajuanAktaKelahiran($id)
    {
        AktaKelahiran::where('id', $id)->delete();
        Alert::success('Success', 'Pengajuan berhasil dihapus!');
        return redirect()->route('pend-pengajuanAkl');
    }

    // pengajuan akta kematian
    public function pengajuanAktaKematian()
    {
        $id_penduduk = auth()->user()->id_penduduk;
        $pengajuanAkm = DB::table('akta_kematian')
            ->where('id_penduduk', $id_penduduk)
            ->get();
        return view('penduduk.pengajuanAktaKematian.index', [
            'title' => 'Pengajuan',
            'pengajuanAkm' => $pengajuanAkm
        ]);
    }

    public function addPengajuanAktaKematian()
    {
        return view('penduduk.pengajuanAktaKematian.add', [
            'title' => 'Pengajuan'
        ]);
    }

    public function storePengajuanAktaKematian(Request $request)
    {
        // get user id penduduk
        $id_penduduk = auth()->user()->id_penduduk;
        $validatedData = $request->validate([
            'jns_pengajuan' => 'required',
            'nama_alm_pend' => 'required',
            'jns_kel_alm' => 'required',
            'tmp_lahir_alm' => 'required',
            'tgl_lahir_alm' => 'required|date',
            'tgl_meninggal' => 'required|date',
            // pengajuan 1
            'dok_surat_ket_kematian' => 'file|max:1024',
            'dok_akta_kel_suami_istri' => 'file|max:1024',
            'dok_fc_ktp_alm' => 'file|max:1024',
            'dok_fc_akta_kel_alm' => 'file|max:1024',
            'dok_fc_ktp_ahli_waris' => 'file|max:1024',
            'dok_fc_kk' => 'file|max:1024',
            'dok_fc_ktp_saksi' => 'file|max:1024',
            // pengajuan 2
            'dok_surat_ket_hilang' => 'file|max:1024',
            'dok_fc_akta_hilang' => 'file|max:1024',
            'dok_fc_ktp_alm2' => 'file|max:1024',
            'dok_fc_ktp_saksi2' => 'file|max:1024',
            'dok_fc_kk2' => 'file|max:1024',
        ]);
        $validatedData['id_penduduk'] = $id_penduduk;
        $validatedData['tgl_pengajuan'] = Carbon::now()->format('Y-m-d');
        // pengajuan 1
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
        // pengajuan 2
        if ($request->file('dok_surat_ket_hilang')) {
            $validatedData['dok_surat_ket_hilang'] = $request->file('dok_surat_ket_hilang')->store('dokumen-pengajuan-aktaKematian');
        }
        if ($request->file('dok_fc_akta_hilang')) {
            $validatedData['dok_fc_akta_hilang'] = $request->file('dok_fc_akta_hilang')->store('dokumen-pengajuan-aktaKematian');
        }
        if ($request->file('dok_fc_ktp_alm2')) {
            $validatedData['dok_fc_ktp_alm2'] = $request->file('dok_fc_ktp_alm2')->store('dokumen-pengajuan-aktaKematian');
        }
        if ($request->file('dok_fc_ktp_saksi2')) {
            $validatedData['dok_fc_ktp_saksi2'] = $request->file('dok_fc_ktp_saksi2')->store('dokumen-pengajuan-aktaKematian');
        }
        if ($request->file('dok_fc_kk2')) {
            $validatedData['dok_fc_kk2'] = $request->file('dok_fc_kk2')->store('dokumen-pengajuan-aktaKematian');
        }
        $validatedData['keterangan'] = $request->keterangan;
        $validatedData['catatan'] = NULL;
        $validatedData['status'] = 0;
        AktaKematian::create($validatedData);
        Alert::success('Berhasil!', 'Pengajuan Akta Kematian Baru telah ditambahkan');
        return redirect()->route('pend-pengajuanAkm');
    }

    public function showPengajuanAktaKematian($id)
    {
        $pengajuanAkm = DB::table('akta_kematian')->where('id', $id)->get();
        return view('penduduk.pengajuanAktaKematian.show', [
            'title' => 'Pengajuan',
            'akm' => $pengajuanAkm
        ]);
    }
    public function editPengajuanAktaKematian($id)
    {
        $pengajuanAkm = DB::table('akta_kematian')->where('id', $id)->get();
        return view('penduduk.pengajuanAktaKematian.edit', [
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
            // pengajuan 1
            'dok_surat_ket_kematian' => 'file|max:1024',
            'dok_akta_kel_suami_istri' => 'file|max:1024',
            'dok_fc_ktp_alm' => 'file|max:1024',
            'dok_fc_akta_kel_alm' => 'file|max:1024',
            'dok_fc_ktp_ahli_waris' => 'file|max:1024',
            'dok_fc_kk' => 'file|max:1024',
            'dok_fc_ktp_saksi' => 'file|max:1024',
            // pengajuan 2
            'dok_surat_ket_hilang' => 'file|max:1024',
            'dok_fc_akta_hilang' => 'file|max:1024',
            'dok_fc_ktp_alm2' => 'file|max:1024',
            'dok_fc_ktp_saksi2' => 'file|max:1024',
            'dok_fc_kk2' => 'file|max:1024',
        ]);
        $validatedData['tgl_pengajuan'] = Carbon::now()->format('Y-m-d');
        // pengajuan 1
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
        // pengajuan 2
        if ($request->file('dok_surat_ket_hilang')) {
            $validatedData['dok_surat_ket_hilang'] = $request->file('dok_surat_ket_hilang')->store('dokumen-pengajuan-aktaKematian');
        }
        if ($request->file('dok_fc_akta_hilang')) {
            $validatedData['dok_fc_akta_hilang'] = $request->file('dok_fc_akta_hilang')->store('dokumen-pengajuan-aktaKematian');
        }
        if ($request->file('dok_fc_ktp_alm2')) {
            $validatedData['dok_fc_ktp_alm2'] = $request->file('dok_fc_ktp_alm2')->store('dokumen-pengajuan-aktaKematian');
        }
        if ($request->file('dok_fc_ktp_saksi2')) {
            $validatedData['dok_fc_ktp_saksi2'] = $request->file('dok_fc_ktp_saksi2')->store('dokumen-pengajuan-aktaKematian');
        }
        if ($request->file('dok_fc_kk2')) {
            $validatedData['dok_fc_kk2'] = $request->file('dok_fc_kk2')->store('dokumen-pengajuan-aktaKematian');
        }
        $validatedData['keterangan'] = $request->keterangan;
        $validatedData['catatan'] = NULL;
        $validatedData['status'] = 0;

        AktaKematian::where('id', $id)
            ->update($validatedData);
        Alert::success('Success', 'Pengajuan berhasil diupdate!');
        return redirect()->route('pend-pengajuanAkm');
    }
    public function destroyPengajuanAktaKematian($id)
    {
        AktaKematian::where('id', $id)->delete();
        Alert::success('Success', 'Pengajuan berhasil dihapus!');
        return redirect()->route('pend-pengajuanAkm');
    }
}
