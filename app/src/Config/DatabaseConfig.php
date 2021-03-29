<?php


namespace App\Config;

class DatabaseConfig
{
    private function config(): \PDO
    {
        return new \PDO(
            'mysql:host=localhost;dbname=embraesp',
            'root',
            ''
        );
    }

    public static function connection() : \PDO
    {
        return (new DatabaseConfig)->config();
    }

}