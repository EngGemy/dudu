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
        Schema::create('inclusion_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inclusion_id')->unsigned();
            $table->string('locale')->index();  // ar en
            $table->text('name');
            $table->unique(['inclusion_id', 'locale']);
            $table->foreign('inclusion_id')->references('id')->on('inclusions')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inclusion_translations');
    }
};
