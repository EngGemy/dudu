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
        Schema::create('blog_sub_heads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blog_id')->nullable();
            $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('blog_sub_head_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blog_sub_head_id')->nullable();
            $table->longText('name')->nullable();
            $table->string('locale')->nullable();
            $table->unique(['blog_sub_head_id', 'locale']);
            $table->foreign('blog_sub_head_id')->references('id')->on('blog_sub_heads')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_sub_heads');
    }
};
