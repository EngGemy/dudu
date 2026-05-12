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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->tinyInteger('status')->default(2)->comment('0 = header, 1 = who_we_are,2= vision ,3=mission,4=services,5=team');
            $table->timestamps();
        });

        Schema::create('about_us_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('about_us_id')->unsigned();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('slug')->nullable();
            $table->string('locale')->index();
            $table->unique(['about_us_id', 'locale']);
            $table->foreign('about_us_id')->references('id')->on('about_us')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
