<?php

namespace App\Controllers;


abstract class Controller
{
    public function render(string $view, array $params = [])
    {
        extract($params);
        require '../src/Views/' . $view . '.php';
    }
}