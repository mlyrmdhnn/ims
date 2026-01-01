<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\warehouses;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'username' => 'admin',
            'name' => 'mulya',
            'phone' => '08123456789',
            'role' => 'admin',
            'password' => Hash::make('password')
        ]);

        User::factory()->create([
            'username' => 'client',
            'name' => 'client',
            'phone' => '08123456789',
            'role' => 'client',
            'password' => Hash::make('password'),
            'isClient' => true
        ]);

        User::factory()->create([
            'username' => 'staff',
            'name' => 'staff',
            'phone' => '08123456789',
            'role' => 'staff',
            'password' => Hash::make('password'),
            'isClient' => false,
            'warehouse_id' => warehouses::inRandomOrder()->first()->id
        ]);
    }
}
