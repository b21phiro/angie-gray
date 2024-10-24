<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function get(): JsonResponse
    {
        return response()->json(["message" => "Get all media"]);
    }

    public function post(Request $request): JsonResponse
    {
        return response()->json(["message" => $request->post()]);
    }

    public function delete(): JsonResponse
    {
        return response()->json(["message" => "Delete some media"]);
    }


    public function put(): JsonResponse
    {
        return response()->json(["message" => "Update some media"]);
    }


}
