<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktaKelahiran extends Model
{
    use HasFactory;
    protected $table = 'akta_kelahiran';
    protected $fillable = [
        'id_penduduk', 'nama_anak', 'anak_ke', 'jns_kel_anak', 'tmp_lahir_anak', 'tgl_lahir_anak', 'nama_ayah', 'nama_ibu', 'dok_surat_ket_lahir', 'dok_fc_akta_nikah_ortu', 'dok_fc_kk', 'dok_fc_ktp_suami_istri', 'dok_fc_ktp_saksi', 'dok_fc_ijazah', 'dok_surat_ket_sekolah', 'dok_akta_anak_sblmnya', 'dok_surat_ket_kematian', 'tgl_pengajuan', 'keterangan', 'catatan', 'status'
    ];
}
