<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE TABLE `location_rooms` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `location_id` int(11) NOT NULL,
              `temperature` int(11) NOT NULL,
              `blocks_count` int(11) NOT NULL,
              `updated_at` datetime NOT NULL,
              `created_at` datetime NOT NULL,
              PRIMARY KEY (`id`),
              KEY `location_id` (`location_id`),
              CONSTRAINT `location_rooms_location` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location_rooms');
    }
};
