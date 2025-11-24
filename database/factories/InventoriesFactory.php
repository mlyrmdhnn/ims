<?php

namespace Database\Factories;

use App\Models\Items;
use App\Models\warehouses;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\inventories>
 */
class InventoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'warehouse_id' => null,
            'item_id' => Items::factory(),
            'quantity' => fake()->randomDigit()
        ];
    }
}
