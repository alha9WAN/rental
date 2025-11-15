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
        Schema::create('carpools', function (Blueprint $table) {
                        $table->id();
            $table->foreignId('kategori_id')
                ->constrained('kategori_carpools')
                ->onDelete('cascade');
            $table->string('nama_rute');
            $table->string('tagline');
            $table->string('slug')->unique();
            $table->decimal('harga_per_kursi', 10, 2);
            $table->text('deskripsi');
            $table->string('gambar')->nullable();
            $table->string('lokasi_awal')->nullable();
            $table->string('lokasi_tujuan')->nullable();
            $table->string('jam_berangkat')->nullable();
            $table->decimal('rating', 2, 1)->default(0);
            $table->json('fitur')->nullable();
            // Tambahan WA
            $table->string('whatsapp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carpools');
    }
};
