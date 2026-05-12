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
            if (! Schema::hasColumn('social_settings', 'wechat')) {
                $table->string('wechat')->nullable()->after('tiktok');
            }

            if (! Schema::hasColumn('social_settings', 'line')) {
                $table->string('line')->nullable()->after('wechat');
            }
        });
    }

    public function down(): void
    {
        if (! Schema::hasTable('social_settings')) {
            return;
        }

        Schema::table('social_settings', function (Blueprint $table) {
            if (Schema::hasColumn('social_settings', 'line')) {
                $table->dropColumn('line');
            }

            if (Schema::hasColumn('social_settings', 'wechat')) {
                $table->dropColumn('wechat');
            }
        });
    }
};
