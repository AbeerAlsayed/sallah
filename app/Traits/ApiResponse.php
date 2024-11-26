<?php

namespace App\Traits;

trait ApiResponse
{
    /**
     * نجاح العملية.
     */
    public function successResponse($data = null, $message = 'Operation completed successfully.', $statusCode = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }

    /**
     * فشل العملية.
     */
    public function errorResponse($message = 'An error occurred.', $statusCode = 400, $data = null)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }

    /**
     * الرد عند عدم وجود بيانات.
     */
    public function notFoundResponse($message = 'Resource not found.', $statusCode = 404)
    {
        return $this->errorResponse($message, $statusCode);
    }
}
