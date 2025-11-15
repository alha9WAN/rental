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
        Schema::create('mobils', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained('kategori_mobils')->onDelete('cascade');
            $table->string('nama');
            $table->string('slug')->unique();
            $table->decimal('harga_per_hari', 10,2);
            $table->enum('tipe', ['MPV','City Car','SUV']);
            $table->integer('kursi');
            $table->decimal('rating',2,1)->default(0.0);
            $table->enum('status', ['tersedia','disewa'])->default('tersedia');
            $table->string('lokasi')->nullable();
            $table->string('vendor')->nullable();
            $table->enum('inisial_vendor', ['PT','LR','RT','LA'])->nullable();
            $table->string('whatsapp',30)->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable();
                        // Tambahan
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
        Schema::dropIfExists('mobils');
    }
};
