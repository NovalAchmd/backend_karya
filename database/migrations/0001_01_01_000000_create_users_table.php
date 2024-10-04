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
        Schema::create('users', function (Blueprint $table) {
            $table->string('username')->primary(); // Username sebagai primary key
            $table->string('password'); // Kolom password
            $table->string('email')->unique(); // Kolom email dengan constraint unique
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void // Tambahkan tipe pengembalian
    {
        Schema::dropIfExists('users');
    }
};
