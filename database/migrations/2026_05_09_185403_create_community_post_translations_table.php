<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('community_post_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('community_post_id')
                ->constrained('community_posts')
                ->onDelete('cascade');
            $table->string('locale', 10);
            $table->text('caption')->nullable();
            $table->timestamps();

            $table->unique(['community_post_id', 'locale']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('community_post_translations');
    }
};
