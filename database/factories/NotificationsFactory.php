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
            // $table->id();
            // $table->boolean('isRead')->default(false);
            // $table->foreignId('from')->constrained('users', 'id')->onDelete('cascade');
            // $table->foreignId('to')->constrained('users', 'id')->onDelete('cascade');
            // $table->boolean('isAproved')->default(false);
            // $table->text('desc');
            'isRead' => false,
            'from' => User::factory(),
            'to' => User::factory(),
            // 'transaction_no' => fake()->sentence(rand(1,9)),
            'isAproved' => fake()->randomElement([true, false]),
            'desc' => fake()->text()
        ];
    }
}
