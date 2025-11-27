<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notifications>
 */
class NotificationsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => fake()->uuid(),
            'notification_id' => fake()->sentence(rand(1,5)),
            'isRead' => false,
            'from' => User::factory(),
            'to' => User::factory(),
            'isAproved' => fake()->randomElement([true, false]),
            'title' => fake()->sentence(rand(1,3)),
            'desc' => fake()->text()
        ];
    }
}
