<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Helpers\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use http\Cookie;
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
            'numar_inregistrare_registrul_comertului'=>$request->NIRS,
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
                $qtyIssueProductName = $product->name;
                $cartItems[$product->id]['quantity'] = $product->quantity;
                \Illuminate\Support\Facades\Cookie::queue('cart_items',json_encode($cartItems),60 * 24 * 30);
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
            return view('messages.success',compact('order'));
        } else {
            return redirect('/checkout')->with('warning','Produsul '. $qtyIssueProductName . ' nu este disponibil in cantitatea aleasa. Asa ca am schimbat-o cu cantitatea maxima disponibila.');
        }

    }
}
