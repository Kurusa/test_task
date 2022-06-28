<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class LocationRoom
 * @OA\Schema(
 *     @OA\Xml(name="LocationRoom"),
 *     @OA\Property(property="id", type="integer", readOnly=true, example=41),
 *     @OA\Property(property="location_id", type="integer", example=39),
 *     @OA\Property(property="temperature", type="integer", example=2),
 *     @OA\Property(property="blocks_count", type="integer", example=5),
 *     @OA\Property(property="updated_at", type="date-time", readOnly=true, example="2020-07-15 10:32:01"),
 *     @OA\Property(property="created_at", type="date-time", readOnly=true, example="2020-07-09 12:51:39"),
 * )
 * @package App\Models
 * @mixin Builder
 */
class LocationRoom extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'location_rooms';

    /**
     * @var string[]
     */
    protected $fillable = [
        'location_id',
        'temperature',
        'blocks_count',
    ];

    protected $with = [
        'booking',
    ];

    /**
     * @return BelongsTo
     */
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * @return HasOne
     */
    public function booking(): HasOne
    {
        return $this->hasOne(RoomBlockBooking::class, 'room_id', 'id');
    }
}
