<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class LocationResource
 * @OA\Schema(
 *     @OA\Xml(name="LocationResource"),
 *     @OA\Property(property="id", type="integer", readOnly=true, example=1000),
 *     @OA\Property(property="name", type="string", example="Stripe"),
 *     @OA\Property(property="free_blocks", type="integer", example=804),
 * )
 * @package App\Http\Resources
 */
class LocationResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'name'        => $this->name,
            'free_blocks' => (int)$this->countFreeBlocks($this->id),
        ];
    }
}
