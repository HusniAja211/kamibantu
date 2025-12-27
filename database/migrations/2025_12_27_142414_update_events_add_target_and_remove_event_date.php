<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            // hapus event_date
            if (Schema::hasColumn('events', 'event_date')) {
                $table->dropColumn('event_date');
            }

            // tambah target relawan
            $table->unsignedInteger('target_volunteers')
                  ->after('end_date')
                  ->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->date('event_date')->after('end_date');
            $table->dropColumn('target_volunteers');
        });
    }
};

