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
        Schema::create('event_iteration_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_iteration_id')->unsigned();
            $table->string('locale')->index();  // ar en
            $table->string('title');
            $table->text('description');
            $table->longText('values');
            $table->unique(['event_iteration_id', 'locale']);
            $table->foreign('event_iteration_id')->references('id')->on('event_iterations')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_iteration_translations');
    }
};
