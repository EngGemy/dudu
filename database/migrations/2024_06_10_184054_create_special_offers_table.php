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
        Schema::create('special_offers', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('status')->default(0);
            $table->timestamps();
        });

        Schema::create('special_offer_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('special_offer_id')->unsigned();
            $table->string('locale')->index();  // ar en
            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('slug')->nullable();
            $table->unique(['special_offer_id', 'locale']);
            $table->foreign('special_offer_id')->references('id')->on('special_offers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('special_offers');
    }
};
