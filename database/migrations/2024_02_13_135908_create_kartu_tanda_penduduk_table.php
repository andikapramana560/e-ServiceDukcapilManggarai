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
            $table->string('dok_fc_kk');
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
        Schema::dropIfExists('kartu_tanda_penduduk');
    }
};
