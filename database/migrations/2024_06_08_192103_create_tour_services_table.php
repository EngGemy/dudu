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
        Schema::create('tour_services', function (Blueprint $table) {
            $table->integer('tour_id')->unsigned();
            $table->integer('service_id')->unsigned();
            $table->primary(['tour_id', 'service_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_services');
    }
};
