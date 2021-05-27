<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SwaggerApiController extends Controller
{
    /**
     * @OA\Get(
     *     path="/",
     *     operationId="getCommonSwagger",
     *     tags={"Swagger"},
     *     summary="Get Swagger api",
     *     description="Returns list",
     *     @OA\Response(
     *         response="200",
     *         description="Successful description",
     *         @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="email", type="string")
     *         )
     *     ),
     *     @OA\Response(response=401, description="not acceptable"),
     *     @OA\Response(response=500, description="internal server error")
     * )
    */
    public function index()
    {
        return \Response::json(['test' => '', 'status' => 200]);
    }
}
