<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    public function getRandomAvatar() {
        $avatars = Storage::disk('avatars')->files('');

        return 'avatars/'.$avatars[array_rand($avatars)];
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->userName(),
            'email' => fake()->unique()->freeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),

            // For others
//            'deals' => 0,
//            'balance' => 0,

            // For 800
//            'deals' => fake()->numberBetween(0, 15),
//            'balance' => fake()->numberBetween(0, 100000),

            // For top 20
            'deals' => fake()->numberBetween(300, 720),
            'balance' => fake()->numberBetween(100000, 600000),

            'avatar' => $this->getRandomAvatar(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
