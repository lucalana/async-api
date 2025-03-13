<?php

namespace App\Traits;

trait ApiResponses
{
    private function success($data = [], int $statusCode = 200, $headers = [])
    {
        return response()->json($data, $statusCode, $headers);
    }
}
