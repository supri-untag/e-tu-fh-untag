<?php

namespace Supri\ETU\UNTAG\Helper;

class HashCodeString
{
    public static function hashString(int $lenght): string
    {
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($str_result), 0, $lenght);
    }

    public static function implode(string $words, int $lenght):string
    {
        return implode(" ", array_slice(explode(" ", $words), 0, $lenght));
    }
}