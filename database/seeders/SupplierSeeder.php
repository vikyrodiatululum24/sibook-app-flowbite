<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class SupplierSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('suppliers')->insert([
      [
        'name' => 'PT. Sumber Makmur',
        'address' => 'Jl. Merdeka No. 123, Jakarta',
        'phone' => '021-12345678',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'name' => 'CV. Buku Pintar',
        'address' => 'Jl. Pendidikan No. 45, Bandung',
        'phone' => '022-87654321',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'name' => 'Toko Buku Sejahtera',
        'address' => 'Jl. Sudirman No. 10, Surabaya',
        'phone' => '031-11223344',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'name' => 'Supplier Nusantara',
        'address' => 'Jl. Asia Afrika No. 77, Medan',
        'phone' => '061-55667788',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'name' => 'PT. Buku Nasional',
        'address' => 'Jl. Diponegoro No. 5, Yogyakarta',
        'phone' => '0274-99887766',
        'created_at' => now(),
        'updated_at' => now(),
      ],
    ]);
  }
}
