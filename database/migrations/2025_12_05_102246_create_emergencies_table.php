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
        Schema::create('emergencies', function (Blueprint $table) {
                      $table->id();
                      //   step 1
            $table->string('unique_id')->unique(); // ER-20251202-xxxxx
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('nationality');
            $table->string('location');
            $table->string('urgency');
            $table->string('language');
            $table->json('assistance_type');
            $table->text('description');
            $table->integer('people_count')->default(1);

            // step 2
            $table->string('total_payment')->nullable();
            $table->string('payment_proof')->nullable(); //foto nya agar sesuai di inputan balde

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emergencies');
    }
};