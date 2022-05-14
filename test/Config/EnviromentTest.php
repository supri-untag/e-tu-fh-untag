<?php

namespace Supri\ETU\UNTAG\Config;

use PHPUnit\Framework\TestCase;

class EnviromentTest extends TestCase
{
    public function testSucces():void
    {
        $env = Enviroment::env("TEST");
        echo $env;
        self::assertSame($env , 'ok');
    }
}
