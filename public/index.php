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
use App\Helpers\ConfigHelper;
use App\Helpers\SessionHelper;
use App\Models\UserModel;

require '../vendor/autoload.php';

$GLOBALS['config']= array(
    'mysql' => array(
        'host'=>'127.0.0.1',
        'username'=>'root',
        'pwd'=>'root',
        'dbName'=>'cogip'
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

$user = new UserModel();
if(SessionHelper::exists(ConfigHelper::get('session/session_name'))){
    $userId = SessionHelper::get(ConfigHelper::get('session/session_name'));
    $user= new UserModel($userId);
}

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
$router->post('/login', fn() => $authController->login(), 'auth.login.post');
$router->get('/logout', fn() => $authController->logout(), 'auth.logout');
$router->get('/contact', fn() => $contactController->list(), 'contact.list');
$router->get('/contact/show/:id', fn($id) => $contactController->show($id), 'contact.show');
$router->get('/invoice', fn() => $invoiceController->list(), 'invoice.list');
$router->get('/invoice/show/:id', fn($id) => $invoiceController->show($id), 'invoice.show');
$router->get('/company', fn() => $companyController->list(), 'company.list');
$router->get('/company/clients', fn() => $companyController->listclients(), 'company.listclients');
$router->get('/company/suppliers', fn() => $companyController->listsuppliers(), 'company.listsuppliers');
$router->get('/company/show/:id', fn($id) => $companyController->show($id), 'company.show');
$router->get('/admin', fn() => $adminController->index(), 'admin.index');
$router->get('/admin/users/', fn() => $adminController->users(), 'admin.users');
$router->get('/admin/addcontact', fn() => $adminController->addcontact(), 'admin.addcontact');
$router->post('/admin/addcontact', fn() => $adminController->addcontact(), 'admin.addcontact.post');
$router->get('/admin/contact/update/:id', fn($id) => $adminController->updateContact($id), 'admin.contact.update');
$router->post('/admin/contact/update/:id', fn($id) => $adminController->updateContact($id), 'admin.contact.update.post');
$router->get('/admin/contact/delete/:id', fn($id) => $adminController->deleteContact($id), 'admin.contact.delete');
$router->get('/admin/addinvoice', fn() => $adminController->addinvoice(), 'admin.addinvoice');
$router->post('/admin/addinvoice', fn() => $adminController->addinvoice(), 'admin.addinvoice.post');
$router->get('/admin/invoice/update/:id', fn($id) => $adminController->updateInvoice($id), 'admin.invoice.update');
$router->post('/admin/invoice/update/:id', fn($id) => $adminController->updateInvoice($id), 'admin.invoice.update.post');
$router->get('/admin/invoice/delete/:id', fn($id) => $adminController->deleteInvoice($id), 'admin.invoice.delete');
$router->get('/admin/addcompany', fn() => $adminController->addcompany(), 'admin.addcompany');
$router->post('/admin/addcompany', fn() => $adminController->addcompany(), 'admin.addcompany.post');
$router->get('/admin/company/update/:id', fn($id) => $adminController->updateCompany($id), 'admin.company.update');
$router->post('/admin/company/update/:id', fn($id) => $adminController->updateCompany($id), 'admin.company.update.post');
$router->get('/admin/company/delete/:id', fn($id) => $adminController->deleteCompany($id), 'admin.company.delete');

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