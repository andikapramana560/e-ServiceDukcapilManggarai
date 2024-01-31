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
            $table->char('no_akta', 16);
            $table->char('no_kk', 16);
            $table->char('nik', 16);
            $table->date('tgl_kematian');
            $table->string('tempat_kematian');
            $table->string('sebab_kematian');
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
