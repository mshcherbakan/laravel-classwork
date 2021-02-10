<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Category;
use App\Models\Product;
use App\Repository\Product\EloquentProductRepository;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class ProductController extends Controller
{
    private $productRepository;

    public function __construct(EloquentProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->findAllWithCategory();
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
        $data = request(['title', 'description', 'category_id', 'price', 'img']);

        $file = $request->file('img');
        if (null != $file) {
            $file->store('public/products');
            $data['img'] = $file->getClientOriginalName();
        }

        Product::create($data);
        return redirect()->route('products');
    }
}
