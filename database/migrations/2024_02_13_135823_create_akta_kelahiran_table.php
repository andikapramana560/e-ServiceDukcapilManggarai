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
            $table->string('jns_pengajuan');
            // pengajuan 1
            $table->string('dok_surat_ket_lahir')->nullable();
            $table->string('dok_fc_akta_nikah_ortu')->nullable();
            $table->string('dok_fc_kk')->nullable();
            $table->string('dok_fc_ktp_suami_istri')->nullable();
            $table->string('dok_fc_ktp_saksi')->nullable();
            $table->string('dok_fc_ijazah')->nullable();
            $table->string('dok_surat_ket_sekolah')->nullable();
            $table->string('dok_akta_anak_sblmnya')->nullable();
            $table->string('dok_surat_ket_kematian')->nullable();
            // pengajuan 2
            $table->string('dok_surat_ket_hilang')->nullable();
            $table->string('dok_fc_akta_hilang')->nullable();
            $table->string('dok_fc_kk_terbaru')->nullable();
            $table->string('dok_fc_ktp_suami_istri2')->nullable();
            $table->string('dok_fc_ktp_saksi2')->nullable();
            // pengajuan 3
            $table->string('dok_akta_asli')->nullable();
            $table->string('dok_ktp')->nullable();
            $table->string('dok_kk2')->nullable();
            $table->string('dok_ijazah')->nullable();
            $table->string('dok_fc_ktp_saksi3')->nullable();
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
        Schema::dropIfExists('akta_kelahiran');
    }
};
