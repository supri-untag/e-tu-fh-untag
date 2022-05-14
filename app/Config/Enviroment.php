<?php

namespace Supri\ETU\UNTAG\Config;
use Dotenv\Dotenv;

class Enviroment
{
    public static function env(string $request) :string
    {
        $env = Dotenv::createImmutable(__DIR__.'/../../');
        $env->load();
        return $_ENV[$request];

    }
}