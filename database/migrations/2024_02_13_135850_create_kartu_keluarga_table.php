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
        Schema::create('kartu_keluarga', function (Blueprint $table) {
            $table->id();
            $table->char('id_penduduk', 16);
            $table->string('nama_kk');
            $table->string('nik_kk');
            $table->string('jns_kel_kk');
            $table->string('tmp_lahir_kk');
            $table->date('tgl_lahir_kk');
            $table->string('agama_kk');
            $table->string('pendidikan_kk');
            $table->string('pekerjaan_kk');
            $table->string('gol_darah_kk');
            $table->string('status_pernikahan_kk');
            $table->date('tgl_pernikahan_kk');
            $table->string('stts_hub_klrg_kk');
            $table->string('kewarganegaraan_kk');
            $table->string('dok_imigrasi_kk');
            $table->string('nama_ayah_kk');
            $table->string('nama_ibu_kk');
            $table->string('dok_ijin_tinggal');
            $table->string('dok_akta_nikah');
            $table->string('dok_fc_ktp');
            $table->string('dok_fc_data_pendukung');
            $table->string('dok_surat_pernyataan');
            $table->string('keterangan');
            $table->string('catatan');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kartu_keluarga');
    }
};
