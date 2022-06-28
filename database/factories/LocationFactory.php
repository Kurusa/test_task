<?php

namespace Database\Factories;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class LocationFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Location::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => fake()->city(),
        ];
    }
}
