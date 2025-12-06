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
           Schema::create('kategori_motors', function (Blueprint $table) {
            $table->id();
      $table->enum('nama', [
                'Electric',
                'Small Matic 110-125cc',
                'Mid Matic 125-155cc',
                'Sport Manual 150-250cc',
                'Big Scooter 250-350cc'
            ])->unique();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_motors');
    }
};