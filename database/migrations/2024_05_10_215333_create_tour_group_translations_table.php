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
        Schema::create('tour_group_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tour_group_id')->unsigned();
            $table->string('locale')->index();  // ar en
            $table->string('name');
            $table->unique(['tour_group_id', 'locale']);
            $table->foreign('tour_group_id')->references('id')->on('tour_groups')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_group_translations');
    }
};
