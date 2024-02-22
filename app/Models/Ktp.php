<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ktp extends Model
{
    use HasFactory;
    protected $table = 'kartu_tanda_penduduk';
    protected $fillable = [
        'id_penduduk', 'nama_pend', 'jns_kel_pend', 'tempat_lahir', 'tgl_lahir', 'alamat', 'usia', 'agama', 'status_pernikahan', 'pekerjaan', 'kewarganegaraan', 'dok_fc_kk', 'tgl_pengajuan', 'keterangan', 'catatan', 'status'
    ];
}
