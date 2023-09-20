<?php

namespace App\Livewire;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class AddToCart extends Component
{

    public $productSlug , $quantity;

    public function handle()
    {
        $product = Product::where('slug', $this->productSlug)->first();
        if($this->quantity === null)
            $this->quantity = 1;
        $quantity = $this->quantity;
        $user = request()->user();
        if ($user) {
            $cartItem = CartItem::where(['user_id' => $user->id , 'product_id' => $product->id])->first();
            if($cartItem){
                $cartItem->quantity += $quantity;
                $cartItem->update();
            } else {
                $data =[
                  'user_id'=>$user->id,
                  'product_id'=>$product->id,
                  'quantity'=>$quantity,
                ];
                CartItem::create($data);
            }
        } else {
            $cartItems = json_decode(request()->cookie('cart_items', '[]'),true);
            $productFound = false;
            foreach($cartItems as &$item){
                if($item['product_id'] === $product->id){
                    $item['quantity'] += $quantity;
                    $productFound = true;
                    break;
                }
            }

            if(!$productFound){
                $cartItems[] = [
                  'product_id'=>$product->id,
                  'quantity'=>$quantity,
                  'price'=>$product->price,
                ];
            }

            Cookie::queue('cart_items',json_encode($cartItems),60 * 24 * 30);
        }

        request()->session()->flash('success_cart', 'Item added to cart successfully');
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
