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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->boolean('is_active');
            $table->bigInteger('category_id');
            $table->bigInteger('price');
            $table->bigInteger('price_offer')->nullable();
            $table->bigInteger('reviews')->nullable();
            $table->bigInteger('rate')->nullable();
            $table->string('photo')->nullable();
            $table->string('long_address')->nullable();
            $table->string('lat_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
