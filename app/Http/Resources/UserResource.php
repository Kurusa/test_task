<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class UserResource
 * @OA\Schema(
 *     @OA\Xml(name="UserResource"),
 *     @OA\Property(property="id", type="integer", readOnly=true, example=1000),
 *     @OA\Property(property="email", type="string", example="johndoe@johndoecompany.com"),
 *     @OA\Property(property="bookings", type="object", ref="#/components/schemas/BookingResource"),
 * )
 * @package App\Http\Resources
 */
class UserResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'       => $this->id,
            'email'    => $this->email,
            'bookings' => BookingResource::collection($this->bookings),
        ];
    }
}
