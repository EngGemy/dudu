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
        Schema::create('iteration_attribute_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iteration_attribute_id')->unsigned();
            $table->string('locale')->index();  // ar en
            $table->string('title');
            $table->text('description');
            $table->unique(['iteration_attribute_id', 'locale'], 'iter_attr_trans_attr_locale_unique');
            $table->foreign('iteration_attribute_id')->references('id')->on('iteration_attributes')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iteration_attribute_translations');
    }
};
