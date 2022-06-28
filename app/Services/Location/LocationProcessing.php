<?php

namespace App\Services\Location;

use Illuminate\Support\Facades\DB;

trait LocationProcessing
{
    public function countFreeBlocks(int $locationId)
    {
        $result = DB::select("
            SELECT lc.id,
                   lc.NAME,
                   Sum(lr.available_blocks) AS available_blocks
            FROM   locations AS lc
                   LEFT JOIN (SELECT lr.location_id,
                                     lr.id,
                                     lr.blocks_count - Sum(COALESCE(rbb.count, 0)) AS
                                                            available_blocks
                              FROM   location_rooms AS lr
                                     LEFT JOIN room_block_bookings AS rbb
                                            ON lr.id = rbb.room_id
                              GROUP  BY lr.id) AS lr
                          ON lr.location_id = lc.id
            WHERE lc.id = {$locationId}
            GROUP  BY lc.id;
        ");
        return $result[0]->count;
    }
}
