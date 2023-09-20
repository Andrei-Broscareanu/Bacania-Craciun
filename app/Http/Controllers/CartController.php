<?php

namespace App\Http\Controllers;

use App\Helpers\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        list($products,$cartItems) = Cart::getProductsAndCartItems();
        $total = 0;
        foreach($products as $product) {
            $total += $product->price * $cartItems[$product->id]['quantity'];
        }
        return view('products.cart',compact('products','total','cartItems'));
    }
}
