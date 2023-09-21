<?php

namespace App\Livewire;

use App\Helpers\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class RemoveFromCart extends Component
{

    public $items = [];
    public $total = 0;
    public $cartItems;

    public function mount(Cart $cart){
        $this->total = Cart::getCartTotal();
        $this->items = $cart->getProductsAndCartItems()[0];
        $this->cartItems = $cart->getProductsAndCartItems()[1];
    }

    public function removeItem($itemId){
        $product = Product::where('id',$itemId)->first();
        $user = request()->user();
        $quantity = 0;
        if($user){
            $cartItem = CartItem::query()->where(['user_id'=>$user->id,'product_id'=>$product->id])->first();
            $quantity = $cartItem->quantity;
            $cartItem->delete();
        } else {
            $cartItems = json_decode(request()->cookie('cart_items','[]'),true);
            foreach ($cartItems as $i => &$item){
                if($item['product_id'] === $product->id){
                    $quantity = $item['quantity'];
                    array_splice($cartItems,$i,1);
                    break;
                }
            }
            Cookie::queue('cart_items',json_encode($cartItems),60*24*30);
        }

        $this->items = $this->items->reject(function ($product) use ($itemId) {
            return $product->id === $itemId;
        });
        $this->total -= $product->price * $quantity;
    }

    public function render()
    {
        return view('livewire.remove-from-cart');
    }
}
