<?php

namespace App\Repository;


use App\Config\DatabaseConfig;

class Repository implements RepositoryInterface
{


    public function getConnection() : \PDO
    {
        $conn = new DatabaseConfig();
        return $conn::connection();
    }

    public function save()
    {
    }

    public function update()
    {

    }

    public function read()
    {
        // TODO: Implement read() method.
    }

    public function find()
    {
        // TODO: Implement find() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
}