<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Helpers\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Cookie;
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

    public function checkout(Request $request){
        if(!$request->cookie('cart_items')){
            return redirect('/');
        }
        if($request->cookie('qtyIssue')){
            $cartItems = json_decode(request()->cookie('qtyIssue', '[]'),true);
            $products = Cart::getProductsAndCartItems()[0];
        } else {
            [$products, $cartItems] = Cart::getProductsAndCartItems();
        }
        $user = request()->user();
        if($user){
            $user_id = $user->id;
        } else {
            $user_id = null;
        }

        $validatedData = $request->validate([
            'email' => ['required', 'email'],
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'province' => 'required',
            'postal_code' => 'required',
            'phone' => ['required']
        ]);

        $total = 0;
        foreach ($products as $product) {
            $total += $product->price * $cartItems[$product->id]['quantity'];
        }
        $orderData = [
            'user_id' => $user_id,
            'billing_email' => $validatedData['email'],
            'billing_name' => $validatedData['name'],
            'billing_address' => $validatedData['address'],
            'billing_city' =>$validatedData['city'],
            'billing_province' => $validatedData['province'],
            'billing_postalcode' => $validatedData['postal_code'],
            'billing_phone' => $validatedData['phone'],
            'billing_total' => $total ,
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
            $total = 0;
        $order = Order::create($orderData);
        foreach ($products as $product) {
            $quantity = $cartItems[$product->id]['quantity'];
            $total += $product->price * $cartItems[$product->id]['quantity'];
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
            Cookie::queue(Cookie::forget('cart_items'));
            Cookie::queue(Cookie::forget('qtyIssue'));

            if(Auth()) {
                $userId = Auth::id();
                CartItem::where('user_id', $userId)->delete();
            }
            return view('messages.success',compact('order'));
        } else {
            Cookie::queue('qtyIssue',json_encode($cartItems),60 * 24 * 30);
            return view('checkout',compact('cartItems','products','qtyIssueProductNames'));
        }

    }
}
