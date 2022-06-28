<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class UserFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = User::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'ge_psid'  => fake()->text('10'),
            'email'    => fake()->email(),
            'password' => fake()->password(),
        ];
    }
}
