<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'admin',
        //     'password' => bcrypt('password'),
            // 'email' => 'admin@gmail.com',
        // ]);

        // $this->call([
        //     // SupplierSeeder::class,
        //     // seeder lain jika ada
        // ]);

        \App\Models\Customer::create([
            'name' => 'John Doe',
            // 'email' => 'john@example.com',
            'phone' => '08123456789',
            'address' => 'Jl. Mawar No. 1, Jakarta',
        ]);
        \App\Models\Customer::create([
            'name' => 'Jane Smith',
            // 'email' => 'jane@example.com',
            'phone' => '08129876543',
            'address' => 'Jl. Melati No. 2, Bandung',
        ]);
        \App\Models\Customer::create([
            'name' => 'Budi Santoso',
            // 'email' => 'budi@example.com',
            'phone' => '081377788899',
            'address' => 'Jl. Kenanga No. 3, Surabaya',
        ]);
        \App\Models\Customer::create([
            'name' => 'Siti Aminah',
            // 'email' => 'siti@example.com',
            'phone' => '081355566677',
            'address' => 'Jl. Anggrek No. 4, Medan',
        ]);
        \App\Models\Customer::create([
            'name' => 'Agus Salim',
            // 'email' => 'agus@example.com',
            'phone' => '081322233344',
            'address' => 'Jl. Dahlia No. 5, Yogyakarta',
        ]);

    }
}
