<?php
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all()->groupBy('category');
        return view('home', compact('products'));
    }

    public function show(Product $product)
    {
        return view('product-show', compact('product'));
    }
}