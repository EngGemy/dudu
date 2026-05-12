<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('social_settings')) {
            return;
        }

        Schema::table('social_settings', function (Blueprint $table) {
            if (! Schema::hasColumn('social_settings', 'douyin')) {
                $table->string('douyin')->nullable()->after('tiktok');
            }

            if (! Schema::hasColumn('social_settings', 'redbook')) {
                $table->string('redbook')->nullable()->after('douyin');
            }
        });
    }

    public function down(): void
    {
        if (! Schema::hasTable('social_settings')) {
            return;
        }

        Schema::table('social_settings', function (Blueprint $table) {
            if (Schema::hasColumn('social_settings', 'redbook')) {
                $table->dropColumn('redbook');
            }

            if (Schema::hasColumn('social_settings', 'douyin')) {
                $table->dropColumn('douyin');
            }
        });
    }
};
