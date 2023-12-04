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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('place_name')->nullable();
            $table->string('hotel_name')->nullable();
            $table->string('hotel_type')->nullable();
            $table->text('hotel_location')->nullable();
            $table->integer('hotel_rating')->nullable();
            $table->text('hotel_description')->nullable();
            $table->text('hotel_image')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
