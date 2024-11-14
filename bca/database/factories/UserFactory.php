<?php

namespace Database\Factories;

use App\Enums\RolesEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            User::NAME => fake()->name(),
            USER::EMAIL => fake()->unique()->safeEmail(),
            USER::SLUG => fake()->slug(),
            USER::EMAIL_VERIFIED_AT => now(),
            USER::PASSWORD => static::$password ??= Hash::make('secret'),
            User::REMEMBER_TOKEN => Str::random(10),
            User::ROLES => json_encode([RolesEnum::ADMIN->value, RolesEnum::USER->value])
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            USER::EMAIL_VERIFIED_AT => null,
        ]);
    }
}
