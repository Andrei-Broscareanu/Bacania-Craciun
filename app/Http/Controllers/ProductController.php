<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function shop()
    {
        $products = Product::all();
        return view('products.shop',compact('products'));
    }

    public function show($slug)
    {
        $product = Product::where('slug',$slug)->first();
        return view('products.show', compact('product'));
    }
}




