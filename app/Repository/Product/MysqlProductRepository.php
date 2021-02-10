<?php


namespace App\Repository\Product;


class MysqlProductRepository implements ProductRepositoryInterface
{
    private $pdo;

    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function findAll()
    {
        // TODO: Implement findAll() method.
    }

    public function findAllWithCategory()
    {
        // TODO: Implement findAllWithCategory() method.
    }
}
