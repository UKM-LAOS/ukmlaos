<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class ResponseFormatterController extends Controller
{
    public static $response = [
        'status' => 'success',
        'message' => null,
        'data' => null
    ];

    public static function success($data = null, $message = null, $code = 200)
    {
        self::$response['data'] = $data;
        self::$response['message'] = $message;

        return response()->json(self::$response, $code);
    }

    public static function error($message, $code = 400)
    {
        self::$response['status'] = 'error';
        self::$response['data'] = null;
        self::$response['message'] = $message;

        return response()->json(self::$response, $code);
    }
}
