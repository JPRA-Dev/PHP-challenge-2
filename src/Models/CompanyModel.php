<?php


namespace App\Models;


class CompanyModel extends Model
{

    public function getTableName(): string
    {
        return "company";
    }

    public function find(array $params)
    {
        // TODO: Implement find() method.
    }

    public function findOne(array $params)
    {
        // TODO: Implement findOne() method.
    }

    public function create($params)
    {
        // TODO: Implement create() method.
    }

    public function existWith($key, $value): bool
    {
        // TODO: Implement existWith() method.
        return false;
    }

    public function update(array $params, int $id)
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }
}