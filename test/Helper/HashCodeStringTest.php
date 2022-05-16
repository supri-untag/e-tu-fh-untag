<?php

namespace Supri\ETU\UNTAG\Helper;

use PHPUnit\Framework\TestCase;

class HashCodeStringTest extends TestCase
{
    public function testWordsFirtword():void
    {
        $implode = HashCodeString::implode('halo ini saya coba', 1);
        self::assertEquals($implode, 'halo');
    }

}
