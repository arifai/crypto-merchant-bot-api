<?php

namespace App\Http\Helpers;

class ResponseBuilder
{
    /**
     * Custom HTTP response
     * @param string $status
     * @param string $message
     * @param string $result
     * @param integer $code
     * 
     * @return App\Http\Helpers\ResponseBuilder
     */
    public static function response($status, $message, $result, $code)
    {
        $customResponse = [
            'status' => $status,
            'message' => $message,
            'result' => $result
        ];

        return response($customResponse, $code)->header('Content-Type', 'application/json');
    }

    public static function responseStatusCount($status, $message, $active, $notActive, $code)
    {
        $customResponse = [
            'status' => $status,
            'message' => $message,
            'result' => [
                'active' => $active,
                'not_active' => $notActive
            ]
        ];

        return response($customResponse, $code)->header('Content-Type', 'application/json');
    }
}
