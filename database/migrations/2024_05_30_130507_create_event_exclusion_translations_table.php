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
        Schema::create('event_exclusion_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_exclusion_id')->unsigned();
            $table->string('locale')->index();  // ar en
            $table->longText('values');
            $table->unique(['event_exclusion_id', 'locale']);
            $table->foreign('event_exclusion_id')->references('id')->on('event_exclusions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_exclusions');
    }
};
