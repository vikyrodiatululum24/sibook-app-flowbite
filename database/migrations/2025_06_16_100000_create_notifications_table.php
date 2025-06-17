<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('notifications', function (Blueprint $table) {
      $table->id();
      $table->string('type')->nullable();
      $table->text('message');
      $table->json('data')->nullable();
      $table->boolean('is_read')->default(false);
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('notifications');
  }
};
