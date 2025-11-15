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
        Schema::create('mitras', function (Blueprint $table) {
    $table->id();
    $table->string('nama');
    $table->string('alamat');
    $table->string('no hp');
    $table->string('email')->nullable();
    $table->string('nama_perusahaan')->nullable();
    $table->enum('jenis_kendaraan', ['mobil', 'motor']);
    $table->string('nama_kendaraan');
    $table->decimal('harga_sewa', 12, 2)->nullable();
    $table->text('deskripsi')->nullable();
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mitras');
    }
};
