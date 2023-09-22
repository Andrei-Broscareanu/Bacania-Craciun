<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Helpers\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use http\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $total = 0;
        list($products,$cartItems) = Cart::getProductsAndCartItems();
        $total = Cart::getCartTotal();
        $qtyIssueProductNames = [];
        return view('checkout',compact('cartItems','products','total','qtyIssueProductNames'));
    }


    public function qtyIssueCase(Request $request){
        dd($request);
    }

    public function checkout(Request $request){
        [$products, $cartItems] = Cart::getProductsAndCartItems();
        $user = request()->user();
        if($user){
            $user_id = $user->id;
        } else {
            $user_id = null;
        }

        $orderData = [
            'user_id' => $user_id,
            'billing_email' => $request->email,
            'billing_name' => $request->name,
            'billing_address' => $request->address,
            'billing_city' => $request->city,
            'billing_province' => $request->province,
            'billing_postalcode' => $request->postalcode,
            'billing_phone' => $request->phone,
            'billing_total' => Cart::getCartTotal(),
            'denumire_societate'=>$request->DS,
            'numar_inregistrare_registrul_comertului'=>$request->NIRC,
            'cod_inregistrare_fiscala'=>$request->CIF,
            'identifier_code'=> 'GRCR' . 100 . random_int(1,2000) ,
            'status' => OrderStatus::Pending,
            'observations'=>$request->observations,
        ];
        //to do:fix qty bug
        $quantityFlag = 0;
        foreach($products as $product){
            $quantity = $cartItems[$product->id]['quantity'];
            if($quantity > $product->quantity){
                $qtyIssueProductNames[] = $product->name;
                $cartItems[$product->id]['quantity'] = $product->quantity;
                $quantityFlag = 1;
            }
        }

        if($quantityFlag == 0){
        $order = Order::create($orderData);
        foreach ($products as $product) {
            $quantity = $cartItems[$product->id]['quantity'];
            $product->quantity -= $quantity;
            $product->save();
            $orderProducts[] = [
                'product_id' => $product->id,
                'quantity' => $quantity,
                'unit_price' => $product->price
            ];
        }

        foreach ($orderProducts as $orderProduct) {
            $orderProduct['order_id'] = $order->id;
            OrderProduct::create($orderProduct);
        }
            \Illuminate\Support\Facades\Cookie::queue(\Illuminate\Support\Facades\Cookie::forget('cart_items'));
            if(Auth()) {
                $userId = Auth::id();
                CartItem::where('user_id', $userId)->delete();
            }
            $qtyIssueProductNames = [];
            return view('messages.success',compact('order','qtyIssueProductNames'));
        } else {
            return view('checkout',compact('cartItems','products','qtyIssueProductNames'));
        }

    }
}
