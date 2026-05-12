<?php

use App\Enum\PopularVideoStatus;
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
        Schema::table('popular_videos', function (Blueprint $table) {
            $table->tinyInteger('status')->default(PopularVideoStatus::INACTIVE->value)->comment('0 = Inactive, 1 = Active');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('popular_videos', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
