<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category:id,title'])
            ->get();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function store(ProductStoreRequest $request)
    {
        $request->validated();
        $data = request(['title', 'description', 'price']);
        Product::create($data);
        return redirect()->to('products');
    }
}
