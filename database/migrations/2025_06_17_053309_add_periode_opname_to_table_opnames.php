<?php

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
        Schema::table('opnames', function (Blueprint $table) {
            $table->string('periode_opname')->nullable()->after('keterangan')->comment('Periode opname untuk mengelompokkan data opname berdasarkan periode tertentu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('opnames', function (Blueprint $table) {
            $table->dropColumn('periode_opname');
        });
    }
};
