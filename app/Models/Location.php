<?php

namespace App\Models;

use App\Services\Location\LocationProcessing;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Location
 * @OA\Schema(
 *     @OA\Xml(name="Location"),
 *     @OA\Property(property="id", type="integer", readOnly=true, example=39),
 *     @OA\Property(property="name", type="string", example="Stripe"),
 *     @OA\Property(property="created_at", type="date-time", readOnly=true, example="2020-07-09 12:51:39"),
 *     @OA\Property(property="updated_at", type="date-time", readOnly=true, example="2020-07-15 10:32:01"),
 * )
 * @package App\Models
 * @mixin Builder
 */
class Location extends Model
{
    use LocationProcessing;
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'locations';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
    ];

    /**
     * @return HasMany
     */
    public function rooms(): HasMany
    {
        return $this->hasMany(LocationRoom::class);
    }
}
