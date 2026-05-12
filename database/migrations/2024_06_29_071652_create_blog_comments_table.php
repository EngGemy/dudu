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
        Schema::create('blog_comments', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->date('date')->nullable();
            $table->integer('rate')->default(1)->nullable();

            $table->unsignedBigInteger('blog_id')->nullable();
            $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('blog_comment_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blog_comment_id')->nullable();
            $table->text('comment')->nullable();
            $table->string('username')->nullable();
            $table->string('locale')->index();
            $table->unique(['blog_comment_id', 'locale']);
            $table->foreign('blog_comment_id')->references('id')->on('blog_comments')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_comments');
    }
};
