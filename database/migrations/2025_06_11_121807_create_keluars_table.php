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
        Schema::create('keluars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('buku_id');
            $table->unsignedBigInteger('customer_id');
            $table->integer('jumlah');
            $table->date('tanggal_keluar');
            $table->string('keterangan')->nullable();
            $table->enum('status', ['lainnya', 'sample', 'terjual'])->default('terjual')->comment('Status buku: dipinjam, dikembalikan, hilang, terjual, sample');
            $table->foreign('buku_id')->references('id')->on('bukus')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keluars');
    }
};
