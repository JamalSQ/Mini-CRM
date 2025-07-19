<?php

namespace App\Utils;

class Reply{

    public static function success($message,$status,$redirectUrl="/"){
        return ([
            "message" => $message,
            "status"  => $status,
            "color"   => "success",
            "redirect" => $redirectUrl,
        ]);
    }

    public static function error($message,$status=422,$redirectUrl="/",$errors,){
        return ([
            "message"  => $message,
            "status"   => $status,
            "redirect" => $redirectUrl,
            "errors"   => $errors,
            "color"    => "error",
        ]);
    }

    public static function info($message,$status){
        return ([
            "message" => $message,
            "status"  => $status,
            "color"   => "info",
        ]);
    }

    public static function warning($message,$status){
        return ([
            "message" => $message,
            "status"  => $status,
            "color"   => "warning",
        ]);
    }


    public static function errorWithData($message,$errors,$status){
        return ([
            "message" => $message,
            "status"  => $status,
            "error"   => $errors,
            "color"   => "warning",
        ]);
    }

    private static function formatResponse(string $type, string $message, int $status, string $redirectUrl = null): array
    {
        $response = [
            'message' => $message,
            'status'  => $status,
            'color'   => $type,
        ];

        if ($redirectUrl) {
            $response['redirect'] = $redirectUrl;
        }

        return $response;
    }


}
