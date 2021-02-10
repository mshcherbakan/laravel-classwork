<?php


namespace App\Repository\Product;

interface ProductRepositoryInterface
{
    public function findAll();

    public function findAllWithCategory();
}
