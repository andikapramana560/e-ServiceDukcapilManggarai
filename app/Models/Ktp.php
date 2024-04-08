<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ktp extends Model
{
    use HasFactory;
    protected $table = 'kartu_tanda_penduduk';
    protected $fillable = [
        'id_penduduk', 'jns_pengajuan', 'nama_pend', 'jns_kel_pend', 'tempat_lahir', 'tgl_lahir', 'alamat', 'usia', 'agama', 'status_pernikahan', 'pekerjaan', 'kewarganegaraan', 'dok_fc_kk', 'dok_fc_kk2', 'dok_srt_ket_hilang', 'dok_ktp_rusak', 'dok_fc_kk3', 'dok_ktp', 'dok_fc_kk4', 'dok_ktp2', 'tgl_pengajuan', 'keterangan', 'catatan', 'status'
    ];
}
