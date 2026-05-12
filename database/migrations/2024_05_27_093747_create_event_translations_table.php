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
        Schema::create('event_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id')->unsigned();
            $table->string('locale')->index();  // ar en
            $table->string('name');
            $table->longText('description');
            $table->unique(['event_id', 'locale']);
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_translations');
    }
};
