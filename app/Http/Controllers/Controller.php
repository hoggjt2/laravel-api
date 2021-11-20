<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function response_message($message, $status) {
        return response()->json([
            'message' => $message,
            'status' => $status
        ], $status);
    }

    public function response_token_message($token, $message, $status) {
        return response()->json([
            'token' => $token,
            'message' => $message,
            'status' => $status
        ], $status);
    }
}
