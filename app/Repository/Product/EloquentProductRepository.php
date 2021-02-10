<?php

namespace App\Repository\Product;

use App\Models\Product;

class EloquentProductRepository implements ProductRepositoryInterface
{
    public function findAll()
    {
        return Product::all();
    }

    public function findAllWithCategory()
    {
        return Product::with(['category:id,title'])
            ->get();
    }
}
