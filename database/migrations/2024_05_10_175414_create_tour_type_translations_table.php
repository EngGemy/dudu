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
        Schema::create('tour_type_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tour_type_id')->unsigned();
            $table->string('locale')->index();  // ar en
            $table->string('name');
            $table->unique(['tour_type_id', 'locale']);
            $table->foreign('tour_type_id')->references('id')->on('tour_types')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_type_translations');
    }
};
