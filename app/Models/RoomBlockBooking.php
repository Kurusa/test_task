<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class RoomBlockBooking
 * @OA\Schema(
 *     @OA\Xml(name="RoomBlockBooking"),
 *     @OA\Property(property="id", type="integer", readOnly=true, example=41),
 *     @OA\Property(property="user_id", type="integer", example=41),
 *     @OA\Property(property="room_id", type="integer", example=39),
 *     @OA\Property(property="count", type="integer", example=2),
 *     @OA\Property(property="start_date", type="date-time", example="2020-07-09 12:51:39"),
 *     @OA\Property(property="end_date", type="date-time", example="2020-07-09 12:51:39"),
 *     @OA\Property(property="created_at", type="date-time", readOnly=true, example="2020-07-09 12:51:39"),
 *     @OA\Property(property="updated_at", type="date-time", readOnly=true, example="2020-07-15 10:32:01"),
 * )
 * @package App\Models
 * @mixin Builder
 */
class RoomBlockBooking extends Model
{
    /**
     * @var string
     */
    protected $table = 'room_block_bookings';

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'room_id',
        'count',
        'start_date',
        'end_date',
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function room(): BelongsTo
    {
        return $this->belongsTo(LocationRoom::class);
    }
}
