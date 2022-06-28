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
            CREATE TABLE `room_block_bookings` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `user_id` int unsigned NOT NULL,
              `room_id` int(11) NOT NULL,
              `count` int(11) NOT NULL,
              `start_date` datetime NOT NULL,
              `end_date` datetime NOT NULL,
              `updated_at` datetime NOT NULL,
              `created_at` datetime NOT NULL,
            PRIMARY KEY (`id`),
            CONSTRAINT `room_block_bookings_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
            CONSTRAINT `room_block_bookings_room` FOREIGN KEY (`room_id`) REFERENCES `location_rooms` (`id`)
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
        Schema::dropIfExists('room_block_bookings');
    }
};
