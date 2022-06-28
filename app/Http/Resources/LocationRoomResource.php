<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class LocationRoomResource
 * @OA\Schema(
 *     @OA\Xml(name="LocationRoomResource"),
 *     @OA\Property(property="id", type="integer", readOnly=true, example=1000),
 *     @OA\Property(property="location", type="object", ref="#/components/schemas/LocationResource"),
 *     @OA\Property(property="temperature", type="integer", example=2),
 *     @OA\Property(property="blocks_count", type="integer", example=5),
 * )
 * @package App\Http\Resources
 */
class LocationRoomResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'           => $this->id,
            'location'     => LocationResource::make($this->location),
            'temperature'  => $this->temperature,
            'blocks_count' => $this->blocks_count,
        ];
    }
}
