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
        Schema::create('tour_highlight_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tour_highlight_id')->unsigned();
            $table->string('locale')->index();  // ar en
            $table->string('name');
            $table->longText('values');
            $table->unique(['tour_highlight_id', 'locale']);
            $table->foreign('tour_highlight_id')->references('id')->on('tour_highlights')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_highlight_translations');
    }
};
