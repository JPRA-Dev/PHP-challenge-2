<?php

use App\Controllers\AuthController;
use App\Controllers\ErrorController;
use App\Controllers\RootController;
use App\Controllers\TestController;

require '../vendor/autoload.php';

$router = new App\Framework\Router\Router($_SERVER['REQUEST_URI']);
$testController = new TestController();
$rootController = new RootController();
$errorController = new ErrorController();
$authController = new AuthController();

$router->get('/', fn() => $rootController->index(), "root.index");
$router->get('/test', fn() => $testController->index(), "test.index");
$router->get('/test/:id', fn($id) => $testController->show($id), 'test.show');
$router->get('/login', fn() => $authController->login(), 'auth.login');

try {
    include '../src/Views/templates/header.php';
    $router->run();
    include '../src/Views/templates/footer.php';
} catch (Exception $e) {
    call_user_func_array(fn() => $errorController->error500(), []);
}