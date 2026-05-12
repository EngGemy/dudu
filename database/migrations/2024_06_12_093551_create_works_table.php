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
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('status')->default(0);
            $table->timestamps();
        });
        Schema::create('work_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('work_id')->unsigned();
            $table->string('locale')->index();  // ar en
            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('slug')->nullable();
            $table->unique(['work_id', 'locale']);
            $table->foreign('work_id')->references('id')->on('works')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('works');
    }
};
