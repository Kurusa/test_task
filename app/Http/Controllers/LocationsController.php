<?php

namespace App\Http\Controllers;

use App\Http\Resources\LocationResource;
use App\Models\Location;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Class LocationsController
 * @package App\Http\Controllers
 */
class LocationsController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/locations",
     *     tags={"Locations"},
     *     summary="Display location list with free blocks count",
     *     security={{"bearerAuth": {}, "psidAuth": {}}},
     *     @OA\Response(
     *         response="200",
     *         description="Display location list with free blocks count",
     *         @OA\JsonContent(
     *             allOf={
     *                 @OA\Schema(
     *                     @OA\Property(
     *                         property="data",
     *                         type="array",
     *                         @OA\Items(ref="#/components/schemas/LocationResource")
     *                     )
     *                 )
     *             }
     *         )
     *     )
     * )
     */
    public function getLocations() {}

    /**
     * @OA\Get(
     *     path="/api/location/{location}/blocks",
     *     tags={"Locations"},
     *     summary="Display location blocks count calculated based on passeed parameters",
     *     security={{"bearerAuth": {}, "psidAuth": {}}},
     *     @OA\Parameter(
     *         name="location",
     *         description="Location id",
     *         in="path",
     *         required=true,
     *         example=1000,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="product_volume",
     *         description="Product volume",
     *         in="query",
     *         required=true,
     *         example=45,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="temperature",
     *         description="Temperature",
     *         in="query",
     *         required=true,
     *         example=45,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="storage_period",
     *         description="Storage period",
     *         in="query",
     *         required=true,
     *         example=21,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Display location blocks count calculated based on passeed parameters",
     *         @OA\JsonContent(
     *             @OA\Property(property="count", type="integer")),
     *         )
     *     )
     * )
     * @param Location $location
     */
    public function getLocationBlockMatches(Location $location) {}
}
