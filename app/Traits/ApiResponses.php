<?php

namespace App\Traits;

trait ApiResponses
{
    private function success($data = [], int $statusCode = 200, $headers = [])
    {
        return response()->json($data, $statusCode, $headers);
    }

    private function error($data = [], int $statusCode = 400, $headers = [])
    {
        return response()->json($data, $statusCode, $headers);
    }

    private function unauthorized($data = [])
    {
        return $this->error($data, 401);
    }
}
