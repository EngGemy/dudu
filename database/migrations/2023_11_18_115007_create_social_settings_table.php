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
        Schema::create('social_settings', function (Blueprint $table) {
            $table->id();
            $table->string('facebook')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('wechat')->nullable();
            $table->string('line')->nullable();
            $table->string('twitter')->nullable();
            $table->string('snap')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('google_play')->nullable();
            $table->string('app_store')->nullable();
            $table->string('telegram')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_settings');
    }
};
