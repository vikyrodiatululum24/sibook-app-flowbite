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
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->integer('inv_id')->unique();
            $table->string('part_no')->unique();
            $table->string('name');
            $table->string('desc')->nullable();
            $table->string('segment_name')->nullable();
            $table->integer('class')->nullable();
            $table->string('kat09a')->nullable();
            $table->string('group_name')->nullable();
            $table->string('penerbit')->nullable();
            $table->string('isbn')->nullable();
            $table->string('bid_studi1')->nullable();
            $table->string('bid_studi2')->nullable();
            $table->integer('th_terbit')->nullable();
            $table->string('author')->nullable();
            $table->string('curriculum')->nullable();
            $table->integer('stock')->default(0);
            $table->decimal('harga', 15, 2)->default(0);
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->timestamps();

            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
