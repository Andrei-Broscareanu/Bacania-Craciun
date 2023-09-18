<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function shop(Request $request)
    {
        $paginate = 10;
        if(request()->category){
            $products = Product::with('categories')->whereHas('categories',function($query){
                $query->where('slug',request()->category);
            })->where('published', 1);
            $categories = Category::all();
        } else {
            $products = Product::search($request->query('search'))
                ->where('published', 1)
                ->take(5);
            $categories = Category::all();
        }

        if(request()->sort == 'low_high'){
            $products = $products->orderBy('price')->paginate($paginate);
        } elseif(request()->sort == 'high_low'){
            $products = $products->orderBy('price','desc')->paginate($paginate);
        } else {
            $products = $products->paginate($paginate);
        }

        return view('products.shop',[
            'products'=>$products,
            'categories'=>$categories,
        ]);
    }

    public function show($slug)
    {
        $product = Product::where('slug',$slug)->first();
        return view('products.show', compact('product'));
    }
}




