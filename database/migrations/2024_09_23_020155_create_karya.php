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
        Schema::create('karya', function (Blueprint $table) {
            $table->id('id_karya'); // Primary key
            $table->string('nim_mhs'); // Foreign key to biodata_mhs
            $table->text('desc_karya'); // Deskripsi karya
            $table->year('tahun_rilis'); // Tahun rilis
            $table->unsignedBigInteger('id_kategori'); // Foreign key to kategori
            $table->string('gambar_karya')->nullable(); // Gambar karya, nullable
            $table->timestamps();
            
            // Foreign key constraints
            $table->foreign('nim_mhs')->references('nim_mhs')->on('biodata_mhs')->onDelete('cascade');
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karya');
    }
};
