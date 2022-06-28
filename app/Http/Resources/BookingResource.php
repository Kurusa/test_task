<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class BookingResource
 * @OA\Schema(
 *     @OA\Xml(name="BookingResource"),
 *     @OA\Property(property="id", type="integer", readOnly=true, example=1000),
 *     @OA\Property(property="room", type="object", ref="#/components/schemas/LocationRoomResource"),
 *     @OA\Property(property="count", type="integer", example=1),
 * )
 * @package App\Http\Resources
 */
class BookingResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'    => $this->id,
            'room'  => LocationRoomResource::make($this->room),
            'count' => $this->count,
        ];
    }
}
