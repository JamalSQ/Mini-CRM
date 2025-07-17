<?php

namespace App\Utils;

class Reply{

    public static function success($message,$status){
        return ([
            "message" => $message,
            "status"  => $status,
            "color"   => "success",
        ]);
    }

    public static function error($message,$status){
        return ([
            "message" => $message,
            "status"  => $status,
            "color"   => "error",
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

    
}