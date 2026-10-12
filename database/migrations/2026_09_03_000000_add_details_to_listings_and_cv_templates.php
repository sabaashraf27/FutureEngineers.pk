<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->json('details')->nullable()->after('status');
        });

        Schema::table('cv_templates', function (Blueprint $table) {
            $table->json('details')->nullable()->after('downloads_count');
        });
    }

    public function down(): void
    {
        Schema::table('cv_templates', function (Blueprint $table) {
            $table->dropColumn('details');
        });

        Schema::table('listings', function (Blueprint $table) {
            $table->dropColumn('details');
        });
    }
};
