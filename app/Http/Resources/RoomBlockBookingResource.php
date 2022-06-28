<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class RoomBlockBookingResource
 * @OA\Schema(
 *     @OA\Xml(name="RoomBlockBookingResource"),
 *     @OA\Property(property="id", type="integer", readOnly=true, example=1000),
 *     @OA\Property(property="user", type="object", ref="#/components/schemas/UserResource"),
 *     @OA\Property(property="room", type="object", ref="#/components/schemas/LocationRoomResource"),
 *     @OA\Property(property="count", type="integer", example=2),
 *     @OA\Property(property="start_date", type="date-time", example="2020-07-25 13:20:00"),
 *     @OA\Property(property="end_date", type="date-time", example="2020-07-25 13:20:00"),
 * )
 * @package App\Http\Resources
 */
class RoomBlockBookingResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'user'       => UserResource::make($this->user),
            'room'       => LocationRoomResource::make($this->room),
            'count'      => $this->count,
            'start_date' => $this->start_date,
            'end_date'   => $this->end_date,
        ];
    }
}
