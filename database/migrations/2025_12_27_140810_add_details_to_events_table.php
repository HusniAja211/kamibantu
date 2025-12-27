<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('location_name')->after('category');
            $table->decimal('latitude', 10, 7)->nullable()->after('location_name');
            $table->decimal('longitude', 10, 7)->nullable()->after('latitude');

            $table->dateTime('start_date')->after('longitude');
            $table->dateTime('end_date')->after('start_date');

            $table->string('banner_path')->nullable()->after('end_date');
        });
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn([
                'location_name',
                'latitude',
                'longitude',
                'start_date',
                'end_date',
                'banner_path',
            ]);
        });
    }
};

