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
        Schema::create('biodata_mhs', function (Blueprint $table) {
            $table->string('nim_mhs')->primary();
            $table->string('nama_mhs');
            $table->string('prodi');
            $table->string('jurusan');
            $table->string('email')->unique(); 
            $table->string('no_hp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodata__mhs');
    }
};
