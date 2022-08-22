<?php

namespace Supri\ETU\UNTAG\Helper;

class ViewHelper
{
    public static function includeRender(string $file):void
    {
        require __DIR__.'/../View/'.$file.'.php';
    }
}