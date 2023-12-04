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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->integer('package_category_id')->nullable();
            $table->integer('place_id')->nullable();
            $table->string('tour_title')->nullable();
            $table->text('tour_address')->nullable();
            $table->integer('tour_rating')->nullable();
            $table->integer('tour_price')->nullable();
            $table->integer('tour_discount_price')->nullable();
            $table->date('tour_start_date')->nullable();
            $table->date('tour_end_date')->nullable();
            $table->integer('guest_count')->nullable();
            $table->longText('overview')->nullable();
            $table->longText('meeting_pickup')->nullable();
            $table->longText('expectations')->nullable();
            $table->longText('included_excluded')->nullable();
            $table->longText('terms_conditions')->nullable();
            $table->text('package_image')->nullable();
            $table->tinyInteger('status')->default(1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
