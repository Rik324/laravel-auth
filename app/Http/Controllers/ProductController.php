<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of all products, grouped by category.
     */
    public function index()
    {
        // Fetch all products and group them by their 'category' field
        $products = Product::all()->groupBy('category');

        // Pass the grouped products to the 'home' view
        return view('home', compact('products'));
    }

    /**
     * Display a single product.
     */
    public function show(Product $product)
    {
        // Pass the specific product to the 'product-show' view
        return view('product-show', compact('product'));
    }
}