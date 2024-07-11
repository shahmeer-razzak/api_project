<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected function successResponse($data, $message = 'Operation Successful', $statusCode = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }

    protected function errorResponse($message, $statusCode = 400)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
        ], $statusCode);
    }
}
