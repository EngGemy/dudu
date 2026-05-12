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
        Schema::create('exclusion_translations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('exclusion_id')->unsigned();
            $table->string('locale')->index();  // ar en
            $table->text('name');
            $table->unique(['exclusion_id', 'locale']);
            $table->foreign('exclusion_id')->references('id')->on('exclusions')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exclusion_translations');
    }
};
