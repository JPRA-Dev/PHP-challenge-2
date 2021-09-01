<?php

namespace App\Controllers;


use App\Helpers\RedirectHelper;

abstract class Controller
{
    public function render(string $view, array $params = [])
    {
        extract($params);
        require '../src/Views/' . $view . '.php';
    }

    public function userIsLogged() : bool
    {
        global $user;
        return $user->isLoggedIn();
    }

    public function userHasPermission($permission) : bool
    {
        global $user;
        return $user->hasPermission($permission);
    }

    public function userLogout()
    {
        global $user;
        $user->logout();
    }

    public function redirect($location)
    {
        RedirectHelper::to($location);
        exit();
    }
}