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
        Schema::create('terms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('term_translations', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('term_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('slug')->nullable();
            $table->unique(['term_id', 'locale']);
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terms');
    }
};
