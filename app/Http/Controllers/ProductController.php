<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function shop(Request $request)
    {
        if($request->query('search')){
            $products = Product::search($request->query('search'))
                ->where('published', true)
                ->get();
            $categories = Category::all();
        }

        elseif($request->category) {
            $products = Product::with('category')->whereHas('category', function($query){
                $query->where('name', request()->category);
            })->get();
            $categories = Category::all();
        } else {
            $products = Product::all();
            $categories = Category::all();
        }
       return view('products.shop',compact('products','categories'));
    }

    public function show($slug)
    {
        $product = Product::where('slug',$slug)->first();
        return view('products.show', compact('product'));
    }
}




