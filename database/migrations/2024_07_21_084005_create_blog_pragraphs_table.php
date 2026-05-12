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
        Schema::create('blog_pragraphs', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('blog_id')->nullable();
            $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('blog_pragraph_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blog_pragraph_id')->nullable();
            $table->string('locale')->nullable();
            $table->string('title')->nullable();
            $table->unique(['blog_pragraph_id', 'locale']);
            $table->foreign('blog_pragraph_id')->references('id')->on('blog_pragraphs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_pragraph_translations');
        Schema::dropIfExists('blog_pragraphs');
    }
};
