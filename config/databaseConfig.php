<?php
require_once __DIR__.'/../vendor/autoload.php';

function databaseConfig() :array {
    $env = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
    $env->load();
    /*
     * database production
     * take from .env
    */
    $hostProd = $_ENV['APP_DATABASE_HOST'];
    $portProd = $_ENV['APP_DATABASE_PORT'];
    $databaseNameProd = $_ENV['APP_DATABASE_NAME'];
    $databaseUsernameProd = $_ENV['APP_DATABASE_USERNAME'];
    $databasePasswordProd = $_ENV['APP_DATABASE_PASSWORD'];

    /*
    * database test
    * take from .env
   */
    $hostTest= $_ENV['TEST_DATABASE_HOST'];
    $portTest = $_ENV['TEST_DATABASE_PORT'];
    $databaseNameTest = $_ENV['TEST_DATABASE_NAME'];
    $databaseUsernameTest = $_ENV['TEST_DATABASE_USERNAME'];
    $databasePasswordTest = $_ENV['TEST_DATABASE_PASSWORD'];

    return [
        "database" => [
            "test" =>[
                "url" => "mysql:host=".$hostTest.":".$portTest.";dbname=".$databaseNameTest,
                "username" => $databaseUsernameTest,
                "password" => $databasePasswordTest
            ],
            "prod" =>[
                "url" => "mysql:host=".$hostProd.":".$portProd.";dbname=".$databaseNameProd,
                "username" => $databaseUsernameProd,
                "password" => $databasePasswordProd
            ]
        ]
    ];
}