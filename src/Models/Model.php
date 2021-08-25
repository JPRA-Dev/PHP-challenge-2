<?php

namespace App\Models;

use App\Database\Database;

abstract class Model
{
    public function getDB(): Database
    {
        return Database::getInstance();
    }

    /**
     * Getter to get the table name
     * @return mixed
     */
    abstract public function getTableName(): string;

    /**
     * Find with params condition (where)
     * @param array $params
     * @return mixed
     */
    abstract public function find(array $params);

    /**
     * Find one with params condition (where)
     * @param array $params
     * @return mixed
     */
    abstract public function findOne(array $params);

    /**
     * Create a new user
     * @param $params
     * @return mixed
     */
    abstract public function create($params);

    /**
     * Check if exist with column key and the value of key
     * @param $key
     * @param $value
     * @return bool
     */
    abstract public function existWith($key, $value): bool;

    /**
     * Update params where id
     * @param array $params
     * @param int $id
     * @return mixed
     */
    abstract public function update(array $params, int $id);

    /**
     * Delete where id
     * @param int $id
     * @return mixed
     */
    abstract public function delete(int $id);
}