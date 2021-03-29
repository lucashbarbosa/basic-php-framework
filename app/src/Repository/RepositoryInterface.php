<?php
namespace App\Repository;
use App\Model\EmbraespTable;


interface RepositoryInterface
{
    public function getConnection();
    public function save();
    public function update();
    public function read();
    public function find();
    public function delete();
}