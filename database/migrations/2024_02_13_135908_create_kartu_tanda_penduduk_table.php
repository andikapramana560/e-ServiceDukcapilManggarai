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
        Schema::create('kartu_tanda_penduduk', function (Blueprint $table) {
            $table->id();
            $table->char('id_penduduk', 16);
            $table->string('jns_pengajuan');
            $table->string('nama_pend');
            $table->string('jns_kel_pend');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('alamat');
            $table->string('usia');
            $table->string('agama');
            $table->string('status_pernikahan');
            $table->string('pekerjaan');
            $table->string('kewarganegaraan');
            // pengajuan 1
            $table->string('dok_fc_kk')->nullable();
            // pengajuan 2
            $table->string('dok_fc_kk2')->nullable();
            $table->string('dok_srt_ket_hilang')->nullable();
            $table->string('dok_ktp_rusak')->nullable();
            // pengajuan 3
            $table->string('dok_fc_kk3')->nullable();
            $table->string('dok_ktp')->nullable();
            // pengajuan 4
            $table->string('dok_fc_kk4')->nullable();
            $table->string('dok_ktp2')->nullable();
            $table->date('tgl_pengajuan');
            $table->string('keterangan')->nullable();
            $table->string('catatan')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kartu_tanda_penduduk');
    }
};
