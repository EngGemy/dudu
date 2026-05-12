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
        Schema::create('privacies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('privacy_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('privacy_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('slug')->nullable();
            $table->unique(['privacy_id', 'locale']);
            $table->foreign('privacy_id')->references('id')->on('privacies')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('privacies');
    }
};
