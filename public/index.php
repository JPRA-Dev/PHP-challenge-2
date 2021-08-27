<?php
session_start();

use App\Controllers\AdminController;
use App\Controllers\AuthController;
use App\Controllers\CompanyController;
use App\Controllers\ContactController;
use App\Controllers\ErrorController;
use App\Controllers\InvoiceController;
use App\Controllers\RootController;
use App\Controllers\TestController;
use App\Database\Database;
use App\Helpers\ConfigHelper;
use App\Helpers\CookieHelper;
use App\Helpers\SessionHelper;

require '../vendor/autoload.php';

$GLOBALS['config']= array(
    'mysql' => array(
        'host'=>'127.0.0.1',
        'username'=>'root',
        'pwd'=>'',
        'dbName'=>'cogip'
    ),
    'remember'=> array(
        'cookie_name'=>'hash',
        'cookie_expiry'=> 604800
    ),
    'session'=> array(
        'session_name'=> 'user',
        'token_name'=>'token'
    ),
    'env' => 'dev' // dev or prod
);

/**
 * Router & Controllers instance
 */
$router = new App\Framework\Router\Router($_SERVER['REQUEST_URI']);
$testController = new TestController();
$rootController = new RootController();
$errorController = new ErrorController();
$authController = new AuthController();
$contactController = new ContactController();
$invoiceController = new InvoiceController();
$companyController = new CompanyController();
$adminController = new AdminController();

/**
 * Routes
 */
$router->get('/', fn() => $rootController->index(), "root.index");
$router->get('/error-permission', fn() => $errorController->errorPermission(), "error.permission");
$router->get('/error-404', fn() => $errorController->error404(), "error.404");
$router->get('/error-500', fn() => $errorController->error500(), "error.500");
$router->get('/test', fn() => $testController->index(), "test.index");
$router->get('/test/:id', fn($id) => $testController->show($id), 'test.show');
$router->get('/login', fn() => $authController->login(), 'auth.login');
$router->get('/contact', fn() => $contactController->list(), 'contact.list');
$router->get('/contact/show/:id', fn($id) => $contactController->show($id), 'contact.show');
$router->get('/invoice', fn() => $invoiceController->list(), 'invoice.list');
$router->get('/invoice/show/:id', fn($id) => $invoiceController->show($id), 'invoice.show');
$router->get('/company', fn() => $companyController->list(), 'company.list');
$router->get('/company/show/:id', fn($id) => $companyController->show($id), 'company.show');
$router->get('/admin', fn() => $adminController->index(), 'admin.index');
$router->get('/admin/addcontact', fn() => $adminController->addcontact(), 'admin.addcontact');
$router->get('/admin/addinvoice', fn() => $adminController->addinvoice(), 'admin.addinvoice');
$router->get('/admin/addcompany', fn() => $adminController->addcompany(), 'admin.addcompany');


if(CookieHelper::exists(ConfigHelper::get('remember/cookie_name')) && !SessionHelper::exists(ConfigHelper::get('session/session_name'))){
    $hash=CookieHelper::get(ConfigHelper::get('remember/cookie_name'));
    $hashCheck = Database::getInstance()->get('users_session', array('hash', '=', $hash));

    if ($hashCheck->count()){
        $user= new User($hashCheck->first()->user_id);
        $user->login();
    }
}

try {
    include '../src/Views/templates/header.php';
    $router->run();
    include '../src/Views/templates/footer.php';
} catch (Exception $e) {
    if ($GLOBALS["config"]["env"] === "dev") {
        die($e);
    } else {
        call_user_func_array(fn() => $errorController->error500(), []);
    }
}