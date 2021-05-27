<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiController extends Controller
{
    /**
     * @OA\Post(
     *      path="/api/v1/all-user",
     *      operationId="getUserList",
     *      tags={"Users"},
     *      security={
     *          {"passport": {}},
     *          },
     *      summary="Get list of users amela",
     *      description="Returns list of users",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
    */
    public function allUsers()
    {
        $users = User::all();
        return response()->json([
            'status' => 'success',
            'status_code' => Response::HTTP_OK,
            'data' => [
                'users' => UserResource::collection($users)
            ],

            'message' => 'All users pulled out successfully'

        ]);
    }

    /**
     * @OA\Post(
     *      path="/api/v1/user-info",
     *      operationId="getUserInfo",
     *      tags={"Users"},
     *      security={
     *          {"passport": {}},
     *      },
     *      summary="Get user info",
     *      description="Returns user info",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */
    public function getUser()
    {
        $user = \Auth::user();
        return response()->json([
            'status' => 'success',
            'status_code' => Response::HTTP_OK,
            'data' => $user,
            'message' => 'Active tests pulled out successfully'
        ]);
    }
}
