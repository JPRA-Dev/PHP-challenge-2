<?php

namespace App\Models;

use App\Database\Database;

abstract class Model
{
    public function getDB(): Database
    {
        return Database::getInstance();
    }
}