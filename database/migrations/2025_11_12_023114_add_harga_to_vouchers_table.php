<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan perubahan migrasi (menambah kolom harga).
     */
    public function up(): void
    {
        Schema::table('vouchers', function (Blueprint $table) {
            // Tambahkan kolom harga setelah kolom 'diskon'
            $table->decimal('harga', 10, 2)->after('diskon')->nullable();
        });
    }

    /**
     * Batalkan perubahan migrasi (hapus kolom harga jika di-rollback).
     */
    public function down(): void
    {
        Schema::table('vouchers', function (Blueprint $table) {
            $table->dropColumn('harga');
        });
    }
};
