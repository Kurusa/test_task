<?php

namespace Database\Factories;

use App\Models\LocationRoom;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class LocationRoomFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = LocationRoom::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'temperature'  => fake()->numberBetween(-10, 10),
            'blocks_count' => fake()->numberBetween(1, 20),
        ];
    }
}
