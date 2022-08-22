<?php

namespace Supri\ETU\UNTAG\Helper;

class RenderHelper
{
    public Static function renderHelper(string $files): void
    {
        require __DIR__.'/../View/'.$files.'.php';
    }
}