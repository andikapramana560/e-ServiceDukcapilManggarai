<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktaKelahiran extends Model
{
    use HasFactory;
    protected $table = 'akta_kelahiran';
    protected $fillable = [
        'id_penduduk', 'nama_anak', 'anak_ke', 'jns_kel_anak', 'tmp_lahir_anak', 'tgl_lahir_anak', 'nama_ayah', 'nama_ibu', 'jns_pengajuan', 'dok_surat_ket_lahir', 'dok_fc_akta_nikah_ortu', 'dok_fc_kk', 'dok_fc_ktp_suami_istri', 'dok_fc_ktp_saksi', 'dok_fc_ijazah', 'dok_surat_ket_sekolah', 'dok_akta_anak_sblmnya', 'dok_surat_ket_kematian', 'dok_surat_ket_hilang', 'dok_fc_akta_hilang', 'dok_fc_kk_terbaru', 'dok_fc_ktp_suami_istri2', 'dok_fc_ktp_saksi2', 'dok_akta_asli', 'dok_ktp', 'dok_kk2', 'dok_ijazah', 'dok_fc_saksi3', 'tgl_pengajuan', 'keterangan', 'catatan', 'status'
    ];
}
