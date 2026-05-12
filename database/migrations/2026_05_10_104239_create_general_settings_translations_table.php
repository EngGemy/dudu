<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('general_settings_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('general_setting_id')->unsigned();
            $table->string('locale')->index();
            $table->string('site_name')->nullable();
            $table->text('opening_words')->nullable();
            $table->text('Tags')->nullable();
            $table->string('address')->nullable();
            $table->text('location')->nullable();
            $table->unique(['general_setting_id', 'locale']);
            $table->foreign('general_setting_id')->references('id')->on('general_settings')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('general_settings_translations');
    }
};
