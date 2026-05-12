<?php

use App\Enum\MessageTitle;
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
        Schema::create('join_our_teams', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('title')->default(MessageTitle::Mr->value)->comment('0 => Mr, 1 => Ms');
            $table->tinyInteger('hear_about_us')->default(0);
            $table->string('resume')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->text('message')->nullable();
            $table->string('phone')->nullable();
            $table->string('code')->nullable();

            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('join_our_teams');
    }
};
