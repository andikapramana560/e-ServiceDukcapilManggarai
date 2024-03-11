<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktaKematian extends Model
{
    use HasFactory;
    protected $table = 'akta_kematian';
    protected $fillable = [
        'id_penduduk', 'nama_alm_pend', 'jns_kel_alm', 'tmp_lahir_alm', 'tgl_lahir_alm', 'tgl_meninggal', 'dok_surat_ket_kematian', 'dok_akta_kel_suami_istri', 'dok_fc_ktp_alm', 'dok_fc_akta_kel_alm', 'dok_fc_ktp_ahli_waris', 'dok_fc_kk', 'dok_fc_ktp_saksi', 'tgl_pengajuan', 'keterangan', 'catatan', 'status'
    ];
}
