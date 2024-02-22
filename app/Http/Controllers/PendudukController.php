<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function index(){
        return view('penduduk.dashboard', [
            'title' => 'Dashboard'
        ]);
    }

    // pengajuan ktp
    public function pengajuanKtp(){
        return view('penduduk.pengajuanKtp', [
            'title' => 'Pengajuan'
        ]);
    }

    public function addPengajuanktp(){
        return view('penduduk.addPengajuanKtp', [
            'title' => 'Pengajuan'
        ]);
    }

    public function storePengajuanKtp(Request $request){
        // get user id penduduk
        $id_penduduk = auth()->user()->id;
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
            'dok_fc_kk' => 'required|file|max:1024',
        ]);
        $usia = Carbon::parse($request->tgl_lahir)->age;
        $validatedData['id_penduduk'] = $id_penduduk;
        $validatedData['usia'] = $usia;
        $validatedData['tgl_pengajuan'] = Carbon::now()->format('Y-m-d');
        $validatedData['dok_fc_kk'] = $request->file('dok_fc_kk')->store('dokumen-pengajuan-ktp');
        $validatedData['keterangan'] = $request->keterangan;
        $validatedData['status'] = 0;
    }

    public function showPengajuanKtp($id){

    }

    public function destroyPengajuanKtp($id){
        
    }

    // $validatedData = $request->validate([
    //     'nama_poli' => 'required',
    //     'deskripsi' => 'required',
    //     'gambar' => 'required|file|max:1024',
    // ]);
    // $validatedData['gambar'] = $request->file('gambar')->store('gambar-poli');
    
    // pengajuan kk
    public function pengajuanKk(){
        return view('penduduk.pengajuanKk', [
            'title' => 'Pengajuan'
        ]);
    }

    public function addPengajuanKk(){
        return view('penduduk.addPengajuanKk', [
            'title' => 'Pengajuan'
        ]);
    }

    public function storePengajuanKk(Request $request){
        // get user id penduduk
        $id_penduduk = auth()->user()->id;
        $validatedData = $request->validate([
            'nama_kk' => 'required',
            'nik_kk' => 'required|max:16',
            'jns_kel_kk' => 'required',
            'tmp_lahir_kk' => 'required',
            'tgl_lahir_kk' => 'required|date',
            'agama_kk' => 'required',
            'pendidikan_kk' => 'required',
            'pekerjaan_kk' => 'required',
            'gol_darah_kk' => 'required',
            'status_pernikahan_kk' => 'required',
            'tgl_pernikahan_kk' => 'required|date',
            'stts_hub_klrg_kk' => 'required',
            'kewarganegaraan_kk' => 'required',
            'dok_imigrasi_kk' => 'required',
            'nama_ayah_kk' => 'required',
            'nama_ibu_kk' => 'required',
            'dok_ijin_tinggal' => 'required|file|max:1024',
            'dok_akta_nikah' => 'required|file|max:1024',
            'dok_fc_ktp' => 'required|file|max:1024',
            'dok_fc_data_pendukung' => 'required|file|max:1024',
            'dok_surat_pernyataan' => 'required|file|max:1024',
        ]);
        $validatedData['id_penduduk'] = $id_penduduk;
        $validatedData['tgl_pengajuan'] = Carbon::now()->format('Y-m-d');
        $validatedData['dok_ijin_tinggal'] = $request->file('dok_ijin_tinggal')->store('dokumen-pengajuan-kk');
        $validatedData['dok_akta_nikah'] = $request->file('dok_akta_nikah')->store('dokumen-pengajuan-kk');
        $validatedData['dok_fc_ktp'] = $request->file('dok_fc_ktp')->store('dokumen-pengajuan-kk');
        $validatedData['dok_fc_data_pendukung'] = $request->file('dok_fc_data_pendukung')->store('dokumen-pengajuan-kk');
        $validatedData['dok_surat_pernyataan'] = $request->file('dok_surat_pernyataan')->store('dokumen-pengajuan-kk');
        $validatedData['keterangan'] = $request->keterangan;
        $validatedData['status'] = 0;
    }

    public function showPengajuanKk($id){}
    public function destroyPengajuanKk($id){}

    // anggota kk

    // pengajuan akta kelahiran
    public function pengajuanAktaKelahiran(){
        return view('penduduk.pengajuanAktaKelahiran', [
            'title' => 'Pengajuan'
        ]);
    }

    public function addPengajuanAktaKelahiran(){
        return view('penduduk.addPengajuanAktaKelahiran', [
            'title' => 'Pengajuan'
        ]);
    }

    public function storePengajuanAktaKelahiran(Request $request){
        // get user id penduduk
        $id_penduduk = auth()->user()->id;
        $validatedData = $request->validate([
            'nama_anak' => 'required',
            'anak_ke' => 'required',
            'jns_kel_anak' => 'required',
            'tmp_lahir_anak' => 'required',
            'tgl_lahir_anak' => 'required|date',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'dok_surat_ket_lahir' => 'required|file|max:1024',
            'dok_akta_nikah_ortu' => 'required|file|max:1024',
            'dok_fc_kk' => 'required|file|max:1024',
            'dok_ktp_suami_istri' => 'required|file|max:1024',
            'dok_ktp_saksi' => 'required|file|max:1024',
            'dok_fc_ijazah' => 'required|file|max:1024',
            'dok_surat_ket_sekolah' => 'required|file|max:1024',
            'dok_akta_anak_sebelumnya' => 'required|file|max:1024',
            'dok_surat_ket_kematian' => 'required|file|max:1024',
        ]);
        $validatedData['id_penduduk'] = $id_penduduk;
        $validatedData['tgl_pengajuan'] = Carbon::now()->format('Y-m-d');
        $validatedData['dok_surat_ket_lahir'] = $request->file('dok_surat_ket_lahir')->store('dokumen-pengajuan-aktaKelahiran');
        $validatedData['dok_akta_nikah_ortu'] = $request->file('dok_akta_nikah_ortu')->store('dokumen-pengajuan-aktaKelahiran');
        $validatedData['dok_fc_kk'] = $request->file('dok_fc_kk')->store('dokumen-pengajuan-aktaKelahiran');
        $validatedData['dok_ktp_suami_istri'] = $request->file('dok_ktp_suami_istri')->store('dokumen-pengajuan-aktaKelahiran');
        $validatedData['dok_ktp_saksi'] = $request->file('dok_ktp_saksi')->store('dokumen-pengajuan-aktaKelahiran');
        $validatedData['dok_fc_ijazah'] = $request->file('dok_fc_ijazah')->store('dokumen-pengajuan-aktaKelahiran');
        $validatedData['dok_surat_ket_sekolah'] = $request->file('dok_surat_ket_sekolah')->store('dokumen-pengajuan-aktaKelahiran');
        $validatedData['dok_akta_anak_sebelumnya'] = $request->file('dok_akta_anak_sebelumnya')->store('dokumen-pengajuan-aktaKelahiran');
        $validatedData['dok_surat_ket_kematian'] = $request->file('dok_surat_ket_kematian')->store('dokumen-pengajuan-aktaKelahiran');
        $validatedData['keterangan'] = $request->keterangan;
        $validatedData['status'] = 0;
    }

    public function showPengajuanAktaKelahiran($id){}
    public function destroyPengajuanAktaKelahiran($id){}

    // pengajuan akta kematian
    public function pengajuanAktaKematian(){
        return view('penduduk.pengajuanAktaKematian', [
            'title' => 'Pengajuan'
        ]);
    }

    public function addPengajuanAktaKematian(){
        return view('penduduk.addPengajuanAktaKematian', [
            'title' => 'Pengajuan'
        ]);
    }

    public function storePengajuanAktaKematian(Request $request){
        // get user id penduduk
        $id_penduduk = auth()->user()->id;
        $validatedData = $request->validate([
            'nama_alm_pend' => 'required',
            'jns_kel_alm' => 'required',
            'tmp_lahir_alm' => 'required',
            'tgl_lahir_alm' => 'required|date',
            'tgl_meninggal' => 'required|date',
            'dok_surat_ket_kematian' => 'required|file|max:1024',
            'dok_akta_kel_suami_istri' => 'required|file|max:1024',
            'dok_fc_ktp_alm' => 'required|file|max:1024',
            'dok_fc_akta_kel_alm' => 'required|file|max:1024',
            'dok_fc_ktp_ahli_warid' => 'required|file|max:1024',
            'dok_fc_kk' => 'required|file|max:1024',
            'dok_fc_ktp_saksi' => 'required|file|max:1024',
        ]);
        $validatedData['id_penduduk'] = $id_penduduk;
        $validatedData['tgl_pengajuan'] = Carbon::now()->format('Y-m-d');
        $validatedData['dok_surat_ket_kematian'] = $request->file('dok_surat_ket_kematian')->store('dokumen-pengajuan-aktaKematian');
        $validatedData['dok_akta_kel_suami_istri'] = $request->file('dok_akta_kel_suami_istri')->store('dokumen-pengajuan-aktaKematian');
        $validatedData['dok_fc_ktp_alm'] = $request->file('dok_fc_ktp_alm')->store('dokumen-pengajuan-aktaKematian');
        $validatedData['dok_fc_akta_kel_alm'] = $request->file('dok_fc_akta_kel_alm')->store('dokumen-pengajuan-aktaKematian');
        $validatedData['dok_fc_ktp_ahli_waris'] = $request->file('dok_fc_ktp_ahli_waris')->store('dokumen-pengajuan-aktaKematian');
        $validatedData['dok_fc_kk'] = $request->file('dok_fc_kk')->store('dokumen-pengajuan-aktaKematian');
        $validatedData['dok_fc_ktp_saksi'] = $request->file('dok_fc_ktp_saksi')->store('dokumen-pengajuan-aktaKematian');
        $validatedData['keterangan'] = $request->keterangan;
        $validatedData['status'] = 0;
    }

    public function showPengajuanAktaKematian($id){}
    public function destroyPengajuanAktaKematian($id){}
}
