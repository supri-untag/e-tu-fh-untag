<?php

use Supri\ETU\UNTAG\App\Router;
use Supri\ETU\UNTAG\Config\Database;
use Supri\ETU\UNTAG\Controller\UsersController;
use Supri\ETU\UNTAG\Helper\TimeHelper;
use Supri\ETU\UNTAG\Middleware\MustNotLoginMiddleware;

require_once __DIR__.'/../vendor/autoload.php';
/*
 * ===================
 * Database Konections
 * Time Seting default Zone Jakarta
 * ===================
 * */
Database::getConnection('prod');
$time = new TimeHelper();
$time->setTimeServer();

/*
 * ***************
 * Routing Table
 * ***************
 */

Router::add('GET', '/register', UsersController::class, 'register',[MustNotLoginMiddleware::class]);
Router::add('GET', '/login', UsersController::class, 'login',[MustNotLoginMiddleware::class]);
Router::add('GET', '/register-success', UsersController::class, 'successRegister',[]);
Router::add('POST', '/login', UsersController::class, 'postLogin',[MustNotLoginMiddleware::class]);
Router::add('POST', '/register', UsersController::class, 'postRegister',[MustNotLoginMiddleware::class]);

/*
 * *******************
 * Routing Trigers Run
 * *******************
 */
Router::run();