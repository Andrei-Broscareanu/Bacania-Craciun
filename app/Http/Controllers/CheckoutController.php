<?php

namespace App\Http\Controllers;

use App\Helpers\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $total = 0;
        list($products,$cartItems) = Cart::getProductsAndCartItems();
        $total = Cart::getCartTotal();
        return view('checkout',compact('cartItems','products','total'));
    }
}
