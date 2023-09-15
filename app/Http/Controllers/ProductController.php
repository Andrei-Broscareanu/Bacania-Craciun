<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function shop()
    {
        $pagination = 9;

        if(request()->category) {
            $products = Product::with('category')->whereHas('category', function($query){
                $query->where('name', request()->category);
            })->get();
            $categories = Category::all();
        } else {
            $products = Product::take(12);
            $categories = Category::all();
        }
        if (request()->sort == 'low_high') {
            $products = $products->orderBy('price')->paginate($pagination);
        } elseif (request()->sort == 'high_low') {
            $products = $products->orderBy('price', 'desc')->paginate($pagination);
        } else {
            $products = $products->paginate($pagination);
        }

        return view('products.shop')->with([
            'products'=> $products,
            'categories' => $categories,
        ]);
    }

    public function show($slug)
    {
        $product = Product::where('slug',$slug)->first();
        return view('products.show', compact('product'));
    }
}




