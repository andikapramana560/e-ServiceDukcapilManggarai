<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaKk extends Model
{
    use HasFactory;
    protected $table = 'anggota_keluarga';
    protected $fillable = [
        'id_kep_klrg', 'nama_ak', 'nik_ak', 'jns_kel_ak', 'tmp_lahir_ak', 'tgl_lahir_ak', 'agama_ak', 'pendidikan_ak', 'pekerjaan_ak', 'gol_darah_ak', 'status_pernikahan_ak', 'tgl_pernikahan_ak', 'stts_hub_klrg_ak', 'kewarganegaraan_ak', 'dok_imigrasi_ak', 'nama_ayah_ak', 'nama_ibu_ak'
    ];
}
