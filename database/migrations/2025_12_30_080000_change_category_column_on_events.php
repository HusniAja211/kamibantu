<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Tambah kolom sementara
    Schema::table('events', function (Blueprint $table) {
        $table->unsignedBigInteger('category_tmp')->nullable();
    });

    // 2. Isi category_tmp dengan ID category
    DB::statement("
        UPDATE events
        JOIN categories ON events.category = categories.name
        SET events.category_tmp = categories.id
    ");

    // 3. Hapus kolom lama
    Schema::table('events', function (Blueprint $table) {
        $table->dropColumn('category');
    });

    // 4. Rename kolom tmp → category
    Schema::table('events', function (Blueprint $table) {
        $table->renameColumn('category_tmp', 'category');
    });

    // 5. Jadikan foreign key
    Schema::table('events', function (Blueprint $table) {
        $table->foreign('category')
              ->references('id')
              ->on('categories')
              ->nullOnDelete();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
