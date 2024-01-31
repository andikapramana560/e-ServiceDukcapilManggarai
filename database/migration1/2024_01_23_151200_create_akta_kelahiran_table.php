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
            $table->char('no_akta', 16);
            $table->char('no_kk', 16);
            $table->char('nik_ayah', 16);
            $table->char('nik_ibu', 16);
            $table->char('nik_anak', 16);
            $table->date('tgl_lahir');
            $table->string('tempat_lahir');
            $table->string('jns_kelamin');
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
