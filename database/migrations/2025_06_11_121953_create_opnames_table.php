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
        Schema::create('opnames', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable()->comment('ID pengguna yang melakukan opname');
            $table->unsignedBigInteger('buku_id');
            $table->integer('stock_system');
            $table->integer('stock_opname');
            $table->integer('selisih')->default(0)->comment('Selisih antara stock sistem dan stock opname');
            $table->date('tanggal_opname');
            $table->string('keterangan')->nullable();
            $table->string('periode_opname')->nullable();
            $table->foreign('buku_id')->references('id')->on('bukus')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opnames');
    }
};
