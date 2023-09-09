<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function shop()
    {
        return view('products.shop');
    }
    public function view()
    {
        return view('products.single-product');
    }
}




