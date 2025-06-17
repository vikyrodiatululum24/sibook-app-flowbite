<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('return_bukus', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
      $table->foreignId('buku_id')->constrained('bukus')->onDelete('cascade');
      $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
      $table->date('tanggal_return');
      $table->integer('jumlah');
      $table->string('keterangan')->nullable();
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('return_bukus');
  }
};
