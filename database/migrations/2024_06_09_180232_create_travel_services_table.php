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
        Schema::create('travel_services', function (Blueprint $table) {
            $table->id();
            $table->string('main_image')->nullable();
            $table->string('icon')->nullable();
            $table->timestamps();
        });

        Schema::create('travel_services_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('travel_services_id')->unsigned();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->longText('description')->nullable();
            $table->string('locale')->index();
            $table->unique(['travel_services_id', 'locale']);
            $table->foreign('travel_services_id')->references('id')->on('travel_services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travel_services');
    }
};
