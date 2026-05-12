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
        Schema::create('pragraph_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blog_pragraph_id')->nullable();
            $table->foreign('blog_pragraph_id')->references('id')->on('blog_pragraphs')->onDelete('cascade');
            $table->unsignedBigInteger('blog_id')->nullable();
            $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('pragraph_detail_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pragraph_detail_id')->nullable();
            $table->foreign('pragraph_detail_id')->references('id')->on('pragraph_details')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('locale')->nullable();
            $table->unique(['pragraph_detail_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pragraph_details');
    }
};
