<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;
    protected $table = "penduduk";
    protected $fillable = [
        'nik', 'nama', 'tmp_lahir', 'tgl_lahir', 'alamat', 'jns_kelamin', 'agama', 'status_perkawinan', 'pekerjaan', 'kewarganegaraan' 
    ];
}
