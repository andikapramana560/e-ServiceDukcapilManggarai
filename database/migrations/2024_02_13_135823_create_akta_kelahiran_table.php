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
        Schema::create('akta_kelahiran', function (Blueprint $table) {
            $table->id();
            $table->char('id_penduduk', 16);
            $table->string('nama_anak');
            $table->string('anak_ke');
            $table->string('jns_kel_anak');
            $table->string('tmp_lahir_anak');
            $table->date('tgl_lahir_anak');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('dok_surat_ket_lahir');
            $table->string('dok_fc_akta_nikah_ortu');
            $table->string('dok_fc_kk');
            $table->string('dok_fc_ktp_suami_istri');
            $table->string('dok_fc_ktp_saksi');
            $table->string('dok_fc_ijazah');
            $table->string('dok_surat_ket_sekolah');
            $table->string('dok_akta_anak_sblmnya');
            $table->string('dok_surat_ket_kematian');
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
        Schema::dropIfExists('akta_kelahiran');
    }
};
