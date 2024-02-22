<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kk extends Model
{
    use HasFactory;
    protected $table = 'kartu_keluarga';
    protected $fillable = [
        'id_penduduk', 'nama_kk', 'nik_kk', 'jns_kel_kk', 'tmp_lahir_kk', 'tgl_lahir_kk', 'agama_kk', 'pendidikan_kk', 'pekerjaan_kk', 'gol_darah_kk', 'status_pernikahan_kk', 'tgl_pernikahan_kk', 'stts_hub_klrg_kk', 'kewarganegaraan_kk', 'dok_imigrasi_kk', 'nama_ayah_kk', 'nama_ibu_kk', 'dok_ijin_tinggal', 'dok_akta_nikah', 'dok_fc_ktp', 'dok_fc_data_pendukung', 'dok_surat_pernyataan','tgl_pengajuan', 'keterangan', 'catatan', 'status'
    ];
}
