<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mitras', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat')->nullable();
            $table->string('no_hp');
            $table->string('email')->nullable();
            $table->string('nama_perusahaan')->nullable();

            $table->enum('jenis_kendaraan', ['mobil', 'motor'])->nullable();
            $table->string('nama_kendaraan')->nullable();
            $table->decimal('harga_sewa', 12, 2)->nullable();
            $table->text('deskripsi')->nullable();

            $table->enum('status', [
                'Belum Terverifikasi',
                'Menunggu Konfirmasi',
                'Terverifikasi',
                'Ditolak'
            ])->default('Belum Terverifikasi');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mitras');
    }
};
