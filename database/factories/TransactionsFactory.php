<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Notifications;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\transactions>
 */
class TransactionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'notif_id' => Notifications::factory(),
            'transaction_no' => fake()->sentence(rand(1,4)),
            'owner_transaction' => User::factory()
        ];
    }
}
