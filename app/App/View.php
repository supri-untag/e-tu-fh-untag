<?php

namespace Supri\ETU\UNTAG\App;

class View
{
    public static function render(string $view, $model)
    {
        require __DIR__. '/../View/template/header.php';
        require __DIR__. '/../View/'.$view.'.php';
        require __DIR__. '/../View/template/footer.php';
    }
    public static function singleAjax(string $view, $model)
    {
        require __DIR__. '/../View/Ajax/'.$view.'.php';
    }

    public static function redirect($url)
    {
        header("Location: $url");
        if (getenv("mode") !== "test") {
            exit();
        }
    }
}