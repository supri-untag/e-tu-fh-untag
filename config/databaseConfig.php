<?php

function databaseConfig() :array{
    $env = Dotenv\Dotenv::createImmutable(__DIR__.'/../.env');
    $env->load();
    /*
     * database production
     * take from .env
    */
    $hostProd = getenv('APP_DATABASE_HOST');
    $portProd = getenv('APP_DATABASE_PORT');
    $databaseNameProd = getenv('APP_DATABASE_NAME');
    $databaseUsernameProd = getenv('APP_DATABASE_USERNAME');
    $databasePasswordProd = getenv('APP_DATABASE_PASSWORD');

    /*
    * database test
    * take from .env
   */
    $hostTest= getenv('TEST_DATABASE_HOST');
    $portTest = getenv('TEST_DATABASE_PORT');
    $databaseNameTest = getenv('TEST_DATABASE_NAME');
    $databaseUsernameTest = getenv('TEST_DATABASE_USERNAME');
    $databasePasswordTest = getenv('TEST_DATABASE_PASSWORD');

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