<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('community_posts', function (Blueprint $table) {
            $table->id();
            $table->string('username', 50);
            $table->string('avatar_url')->nullable();
            $table->string('image_url');
            $table->string('instagram_post_url')->nullable();
            $table->enum('platform', ['instagram', 'tiktok', 'twitter', 'manual'])->default('manual');
            $table->string('caption')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();

            $table->index(['is_active', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('community_posts');
    }
};
