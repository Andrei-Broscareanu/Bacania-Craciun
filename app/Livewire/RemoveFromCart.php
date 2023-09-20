<?php

namespace App\Livewire;

use App\Helpers\Cart;
use Livewire\Component;

class RemoveFromCart extends Component
{

    public $items = [];

    public $cartItems;

    public function mount(Cart $cart){
        $this->items = $cart->getProductsAndCartItems()[0];
        $this->cartItems = $cart->getProductsAndCartItems()[1];
    }

    public function removeItem($itemId){
        $this->items = $this->items->reject(function ($product) use ($itemId) {
            return $product->id === $itemId;
        });
    }

    public function render()
    {
        return view('livewire.remove-from-cart');
    }
}
