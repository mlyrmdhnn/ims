<?php

namespace Database\Seeders;

use App\Models\Inventories;
use App\Models\Inventory_units;
use App\Models\Items;
use App\Models\Notifications;
use App\Models\Transactions;
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
        $warehouses = warehouses::factory(5)->create();

        // Buat 10 user dan assign warehouse random
        User::factory(10)->create()->each(function ($user) use ($warehouses) {
            $user->update([
                'warehouse_id' => $warehouses->random()->id,
            ]);
        });

        Items::factory(7)->create();
        Inventories::factory(7)->create()->each(function ($inventories) use ($warehouses) {
            $inventories->update([
                'warehouse_id' => $warehouses->random()->id
            ]);
        });

        Notifications::factory()->create();
        Inventory_units::factory()->create();
        Transactions::factory()->create();

        User::factory()->create([
            'username' => 'admin',
            'name' => 'mulya',
            'phone' => '081295096347',
            'role' => 'admin',
            'password' => Hash::make('password')
        ]);

        User::factory()->create([
            'username' => 'mantap',
            'name' => 'client',
            'phone' => '081295096347',
            'role' => 'client',
            'password' => Hash::make('password'),
            'isClient' => true
        ]);

    }
}
