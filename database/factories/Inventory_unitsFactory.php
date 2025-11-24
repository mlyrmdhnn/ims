<?php

namespace Database\Factories;

use App\Models\Items;
use App\Models\User;
use App\Models\warehouses;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\inventory_units>
 */
class Inventory_unitsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'warehouse_id' => warehouses::factory(),
            'item_id' => Items::factory(),
            'owner_id' => User::factory(),
        ];
    }
}
