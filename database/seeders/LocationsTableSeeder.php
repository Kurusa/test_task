<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\LocationRoom;
use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Location::factory()->count(5)->create()->each(function ($location) {
            $location->rooms()->saveMany(LocationRoom::factory()->count(2)->make());
        });
    }
}
