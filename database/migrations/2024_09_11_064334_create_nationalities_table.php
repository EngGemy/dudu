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
        Schema::create('nationalities', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('nationality_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nationality_id')->unsigned();
            $table->string('locale')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->unique(['nationality_id', 'locale']);
            $table->foreign('nationality_id')->references('id')->on('nationalities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nationalities');
    }
};
