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
        Schema::create('tour_comments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tour_id');
            $table->string('username');
            $table->string('photo')->nullable();
            $table->date('date')->nullable();
            $table->integer('rate')->default(1)->nullable();
            $table->text('comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_comments');
    }
};
