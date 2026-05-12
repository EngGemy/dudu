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
        Schema::create('general_comments', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->date('date')->nullable();
            $table->integer('rate')->default(1)->nullable();
            $table->timestamps();
        });
        Schema::create('general_comment_translations', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('general_comment_id')->nullable();
            $table->text('comment')->nullable();
            $table->string('username')->nullable();
            $table->string('locale')->nullable();
            $table->unique(['general_comment_id', 'locale']);
            $table->foreign('general_comment_id')->references('id')->on('general_comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_comments');
    }
};
