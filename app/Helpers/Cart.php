<?php

namespace App\Helpers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Arr;

class Cart
{
    public static function getCookieCartItems(){
        return json_decode(request()->cookie('cart_items','[]'),true);
    }

    public static function getCartTotal(){
        list($products,$cartItems) = Cart::getProductsAndCartItems();
        $total = 0;
        foreach($products as $index) {
            $total += $index->price * $cartItems[$index->id]['quantity'];
        }
        return $total;
    }

    public static function getCartItems(){
        $request = \request();
        $user = $request->user();
        if ($user) {
            return CartItem::where('user_id', $user->id)->get()->map(
                fn($item) => ['product_id' => $item->product_id, 'quantity' => $item->quantity]
            );
        } else {
            return self::getCookieCartItems();
        }
    }

    public static function getProductsAndCartItems(): array|\Illuminate\Database\Eloquent\Collection
    {
        $cartItems = self::getCartItems();
        $ids = Arr::pluck($cartItems, 'product_id');
        $products = Product::query()->whereIn('id', $ids)->get();
        $cartItems = Arr::keyBy($cartItems, 'product_id');

        return [$products,$cartItems];
    }

    public static function moveCartItemsIntoDB(){
        $cartItems = self::getCookieCartItems();
        $dbCartItems = CartItem::where(['user_id'=>request()->user()->id])->get()->keyBy('product_id');
        foreach($cartItems as $cartItem){
            if(isset($dbCartItems[$cartItem['product_id']])){
                continue;
            }
            $newCartItems[] = [
                'user_id' => request()->user()->id,
                'product_id'=>$cartItem['product_id'],
                'quantity'=>$cartItem['quantity'],
            ];
        }

        if(!empty($newCartItems)){
            CartItem::insert($newCartItems);
        }
    }
}
