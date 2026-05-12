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
        Schema::create('tour_overview_translations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('tour_overview_id')->unsigned();
            $table->string('locale')->index();  // ar en
            $table->longText('values');
            $table->unique(['tour_overview_id', 'locale']);
            $table->foreign('tour_overview_id')->references('id')->on('tour_overviews')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_overview_translations');
    }
};
