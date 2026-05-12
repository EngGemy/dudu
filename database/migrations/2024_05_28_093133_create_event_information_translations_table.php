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
        Schema::create('event_information_translations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('event_info_id')->unsigned();
            $table->string('locale')->index();  // ar en
            $table->string('title');  // ar en
            $table->longText('description');
            $table->unique(['event_info_id', 'locale']);
            $table->foreign('event_info_id')->references('id')->on('event_informations')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_overview_translations');
    }
};
