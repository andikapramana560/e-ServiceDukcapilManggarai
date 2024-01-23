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
        Schema::create('pengajuan_kk', function (Blueprint $table) {
            $table->id();
            $table->char('nik_pemohon', 16);
            $table->char('no_kk', 16);
            $table->string('jns_pengajuan');
            $table->date('tgl_pengajuan');
            $table->string('dokumen1');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_kk');
    }
};
