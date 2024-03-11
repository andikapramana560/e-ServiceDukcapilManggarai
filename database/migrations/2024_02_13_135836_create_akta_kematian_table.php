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
        Schema::create('akta_kematian', function (Blueprint $table) {
            $table->id();
            $table->char('id_penduduk', 16);
            $table->string('nama_alm_pend');
            $table->string('jns_kel_alm');
            $table->string('tmp_lahir_alm');
            $table->date('tgl_lahir_alm');
            $table->date('tgl_meninggal');
            $table->string('dok_surat_ket_kematian');
            $table->string('dok_akta_kel_suami_istri');
            $table->string('dok_fc_ktp_alm');
            $table->string('dok_fc_akta_kel_alm');
            $table->string('dok_fc_ktp_ahli_waris');
            $table->string('dok_fc_kk');
            $table->string('dok_fc_ktp_saksi');
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
        Schema::dropIfExists('akta_kematian');
    }
};
