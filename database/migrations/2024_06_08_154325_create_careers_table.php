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
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0 = header, 1 = body');
            $table->timestamps();
        });

        Schema::create('career_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('career_id')->unsigned();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('slug')->nullable();
            $table->string('locale')->index();
            $table->unique(['career_id', 'locale']);
            $table->foreign('career_id')->references('id')->on('careers')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('careers');
        Schema::dropIfExists('career_translations');
    }
};
