<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class User
 * @OA\Schema(
 *     @OA\Xml(name="User"),
 *     @OA\Property(property="id", type="integer", readOnly=true, example=804),
 *     @OA\Property(property="ge_psid", type="string", readOnly=true, example="5f3a98967f676"),
 *     @OA\Property(property="email", type="string", maxLength=100, example="johndoe@johndoecompany.com"),
 *     @OA\Property(property="password", type="hidden", writeOnly="true", maxLength=100, example="secret"),
 *     @OA\Property(property="created_at", type="date-time", readOnly=true, example="2020-07-09 12:51:39"),
 *     @OA\Property(property="updated_at", type="date-time", readOnly=true, example="2020-07-15 10:32:01"),
 * )
 * @package App\Models
 * @mixin Builder
 */
class User extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var string[]
     */
    protected $fillable = [
        'email',
        'password',
        'ge_psid',
    ];

    /**
     * @var string[]
     */
    protected $hidden = [
        'password',
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(RoomBlockBooking::class);
    }
}
