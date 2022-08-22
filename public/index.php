<?php
if( !session_id() ) {
    session_start();
}
use Supri\ETU\UNTAG\App\Router;
use Supri\ETU\UNTAG\Config\Database;
use Supri\ETU\UNTAG\Controller\AdminController;
use Supri\ETU\UNTAG\Controller\HomeController;
use Supri\ETU\UNTAG\Controller\UsersController;
use Supri\ETU\UNTAG\Helper\TimeHelper;
use Supri\ETU\UNTAG\Middleware\MustLoginMiddleware;
use Supri\ETU\UNTAG\Middleware\MustNotLoginMiddleware;
use Supri\ETU\UNTAG\Middleware\MustSanctumAdminMiddelware;
use Supri\ETU\UNTAG\Middleware\SessionDumpMiddleware;

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
Router::add('GET', '/logout', UsersController::class, 'logout',[MustLoginMiddleware::class]);
Router::add('GET', '/login', UsersController::class, 'login',[MustNotLoginMiddleware::class]);
Router::add('GET', '/register-success', UsersController::class, 'successRegister',[SessionDumpMiddleware::class]);
Router::add('POST', '/login', UsersController::class, 'postLogin',[MustNotLoginMiddleware::class]);
Router::add('POST', '/register', UsersController::class, 'postRegister',[MustNotLoginMiddleware::class]);

Router::add('GET', '/', HomeController::class, 'index',[]);

/*
 * Routing Admin
 * */

Router::add('GET','/invetory/stock', AdminController::class, 'invetoryStock', [MustSanctumAdminMiddelware::class]);
Router::add('GET','/invetory/request', AdminController::class, 'invetoryRequest', [MustSanctumAdminMiddelware::class]);
Router::add('GET','/invetory/circ', AdminController::class, 'invetoryCirl', [MustSanctumAdminMiddelware::class]);

/*
 * *******************
 * Routing Trigers Run
 * *******************
 */
Router::run();