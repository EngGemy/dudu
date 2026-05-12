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
        Schema::create('iteration_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tour_iteration_id')->unsigned();
            $table->string('photo');
            $table->foreign('tour_iteration_id')->references('id')->on('tour_iterations')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_iteration_attributes');
    }
};
