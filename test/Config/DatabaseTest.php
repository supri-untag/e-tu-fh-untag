<?php

namespace Supri\ETU\UNTAG\Config;

use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase
{
    public function testConnection():void
    {
        $con = Database::getConnection();
        self::assertNotNull($con);
    }

    public function testSinggelToneConection():void
    {
        $connection1 = Database::getConnection();
        $connection2 = Database::getConnection();

        self::assertSame($connection1, $connection2);
    }
}
