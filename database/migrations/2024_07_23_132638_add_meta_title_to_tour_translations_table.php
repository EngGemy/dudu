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
        Schema::table('tours', function (Blueprint $table) {
            $table->string('meta_img')->nullable();

        });
        Schema::table('tour_translations', function (Blueprint $table) {
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
        });
        Schema::table('events', function (Blueprint $table) {
            $table->string('meta_img')->nullable();

        });
        Schema::table('event_translations', function (Blueprint $table) {
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
        });
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('meta_img')->nullable();

        });
        Schema::table('blog_translations', function (Blueprint $table) {
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
        });
        Schema::table('careers', function (Blueprint $table) {
            $table->string('meta_img')->nullable();

        });
        Schema::table('career_translations', function (Blueprint $table) {
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
        });
        Schema::table('partners', function (Blueprint $table) {
            $table->string('meta_img')->nullable();

        });
        Schema::table('partner_translations', function (Blueprint $table) {
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
        });
        Schema::table('about_us', function (Blueprint $table) {
            $table->string('meta_img')->nullable();

        });
        Schema::table('about_us_translations', function (Blueprint $table) {
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
        });
        Schema::table('works', function (Blueprint $table) {
            $table->string('meta_img')->nullable();

        });
        Schema::table('work_translations', function (Blueprint $table) {
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
        });

        Schema::table('services', function (Blueprint $table) {
            $table->string('meta_img')->nullable();

        });
        Schema::table('service_translations', function (Blueprint $table) {
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tour_translations', function (Blueprint $table) {
            //
        });
    }
};
