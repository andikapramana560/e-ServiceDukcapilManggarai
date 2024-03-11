<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anggota_keluarga', function (Blueprint $table) {
            $table->id();
            $table->char('id_kep_klrg', 16);
            $table->string('nama_ak');
            $table->string('nik_ak');
            $table->string('jns_kel_ak');
            $table->string('tmp_lahir_ak');
            $table->date('tgl_lahir_ak');
            $table->string('agama_ak');
            $table->string('pendidikan_ak');
            $table->string('pekerjaan_ak');
            $table->string('gol_darah_ak');
            $table->string('status_pernikahan_ak');
            $table->date('tgl_pernikahan_ak');
            $table->string('stts_hub_klrg_ak');
            $table->string('kewarganegaraan_ak');
            $table->string('dok_imigrasi_ak')->nullable();
            $table->string('nama_ayah_ak');
            $table->string('nama_ibu_ak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota_keluarga');
    }
};
