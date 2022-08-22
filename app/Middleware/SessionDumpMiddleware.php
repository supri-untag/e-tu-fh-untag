<?php

namespace Supri\ETU\UNTAG\Middleware;

use Supri\ETU\UNTAG\App\View;

class SessionDumpMiddleware implements Middleware
{
    public function before(): void
    {
        if (!isset($_SESSION['dump'])){
            View::redirect('/');
        }
    }
}