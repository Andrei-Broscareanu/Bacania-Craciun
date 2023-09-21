<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $categories = Category::all();
        $featuredProducts = Product::all()->where('featured',1);
        return view('home',compact('categories','featuredProducts'));
    }

    public function tempIndex(){
        return view('maintenance');
    }

    public function aboutUs() {
        return view('about-us');
    }

    public function contact() {
        return view('contact');
    }

}
