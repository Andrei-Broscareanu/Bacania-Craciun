<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Cart extends Component
{

    public $productSlug,$quantity;

    public function handle(){
      $product = Product::where('slug',$this->productSlug)->first();
      if($this->quantity){
          $quantity = $this->quantity;
      } else {
          $quantity = 1;
      }

      request()->session()->flash('success','Item added to cart successfully');
      //finish logic + alert for user
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
