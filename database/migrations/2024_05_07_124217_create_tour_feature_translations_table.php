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
        Schema::create('tour_feature_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tour_feature_id')->unsigned();
            $table->string('locale')->index();  // ar en
            $table->longText('values');
            $table->unique(['tour_feature_id', 'locale']);
            $table->foreign('tour_feature_id')->references('id')->on('tour_features')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_feature_translations');
    }
};
