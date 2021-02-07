<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Category;
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
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function store(ProductStoreRequest $request)
    {
        $request->validated();
        $data = request(['title', 'description', 'category_id', 'price']);


        $file = $request->file('picture');
        $data['img'] = null;
        if (null != $file) {
            $file->storeAs('public/products', $file->getClientOriginalName());
            $data['img'] = $file->getClientOriginalName();
        }

        Product::create($data);
        return redirect()->to('products');
    }
}
