<?php
require_once __DIR__.'/../vendor/autoload.php';

$env = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$env->load();

$hostProd = $_ENV['APP_DATABASE_HOST'];
echo  $hostProd;