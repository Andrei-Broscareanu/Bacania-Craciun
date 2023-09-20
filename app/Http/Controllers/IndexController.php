<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('home',compact('categories'));
    }

    public function tempIndex(){
        return view('maintenance');
    }

    public function aboutus() {
        return view('about-us');
    }

    public function contact() {
        return view('contact');
    }

}
