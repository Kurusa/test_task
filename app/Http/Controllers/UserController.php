<?php

namespace App\Http\Controllers;

use App\Http\Resources\LocationResource;
use App\Http\Resources\RoomBlockBookingResource;
use App\Http\Resources\UserResource;
use App\Models\Location;
use App\Models\LocationRoom;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/user/{user}/room/{room}/book-block",
     *     tags={"Users"},
     *     summary="Book the specified number of blocks for user",
     *     security={{"bearerAuth": {}, "psidAuth": {}}},
     *     @OA\Parameter(
     *         name="user",
     *         description="User id",
     *         in="path",
     *         required=true,
     *         example=1741,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="room",
     *         description="Room id",
     *         in="path",
     *         required=true,
     *         example=1,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             @OA\Property(property="blocks_count", type="integer", example=2),
     *             @OA\Property(property="start_date", type="date", example="2021-09-01"),
     *             @OA\Property(property="end_date", type="date", example="2021-09-10"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Display created booking",
     *         @OA\JsonContent(
     *             allOf={
     *                 @OA\Schema(
     *                     @OA\Property(
     *                         property="data",
     *                         type="array",
     *                         @OA\Items(ref="#/components/schemas/RoomBlockBookingResource")
     *                     )
     *                 )
     *             }
     *         )
     *     )
     * )
     * @param Request $request
     * @param User $user
     * @param LocationRoom $room
     * @return JsonResponse|RoomBlockBookingResource
     */
    public function postRoomBlockBooking(Request $request, User $user, LocationRoom $room): RoomBlockBookingResource|JsonResponse
    {
        if ($request->missing(['blocks_count', 'start_date', 'end_date'])
            || $room->location->countFreeBlocks($room->location->id) < $request->get('blocks_count')) {
            return response()->json([], Response::HTTP_BAD_REQUEST);
        }

        $request->validate([
            'start_date' => 'date_difference:start_date,end_date',
        ]);

        $booking = $user->bookings()->create([
            'room_id'    => $room->id,
            'count'      => $request->get('blocks_count'),
            'start_date' => $request->get('start_date'),
            'end_date'   => $request->get('end_date'),
        ]);

        return RoomBlockBookingResource::make($booking->load(['user', 'room']));
    }

    /**
     * @OA\Get(
     *     path="/api/user/{user}/bookings",
     *     tags={"Users"},
     *     summary="Display user booking list",
     *     security={{"bearerAuth": {}, "psidAuth": {}}},
     *     @OA\Parameter(
     *         name="user",
     *         description="User id",
     *         in="path",
     *         required=true,
     *         example=1741,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Display user booking list",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/BookingResource")
     *         ),
     *     )
     * )
     */
    public function getBookings(User $user): JsonResponse {}
}
