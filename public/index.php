<?php

use App\Controllers\AdminController;
use App\Controllers\AuthController;
use App\Controllers\CompanyController;
use App\Controllers\ContactController;
use App\Controllers\ErrorController;
use App\Controllers\InvoiceController;
use App\Controllers\RootController;
use App\Controllers\TestController;

require '../vendor/autoload.php';

$router = new App\Framework\Router\Router($_SERVER['REQUEST_URI']);
$testController = new TestController();
$rootController = new RootController();
$errorController = new ErrorController();
$authController = new AuthController();
$contactController = new ContactController();
$invoiceController = new InvoiceController();
$companyController = new CompanyController();
$adminController = new AdminController();

$router->get('/', fn() => $rootController->index(), "root.index");
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

try {
    include '../src/Views/templates/header.php';
    $router->run();
    include '../src/Views/templates/footer.php';
} catch (Exception $e) {
    call_user_func_array(fn() => $errorController->error500(), []);
}