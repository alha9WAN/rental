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
        Schema::create('vouchers', function (Blueprint $table) {
               $table->id();
            $table->foreignId('kategori_id')->constrained('kategori_vouchers')->onDelete('cascade');
            $table->string('nama');
            $table->string('slug')->unique();
            $table->decimal('diskon',5,2)->nullable();
            $table->text('deskripsi')->nullable();
            $table->date('berlaku_hingga')->nullable();
            $table->enum('status',['aktif','kadaluarsa'])->default('aktif');
            $table->string('whatsapp')->nullable();
            $table->string('gambar')->nullable();
              // tambahan
            $table->string('tagline')->nullable();
            $table->json('fitur')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};