<?php

namespace Supri\ETU\UNTAG\Helper;

class HostHelper
{
    public static function curentHost(): string
    {
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
            $url = "https://";
        }else {
            $url = "http://";
        }
        $url .= $_SERVER['HTTP_HOST'];
        return $url;
    }
}