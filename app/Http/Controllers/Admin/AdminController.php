<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        $ordersFromPastWeek = Order::where('created_at', '>=', $startOfWeek)
            ->where('created_at', '<=', $endOfWeek)->get();
        $ordersPast24H = Order::where('created_at', '>=', Carbon::now()->startOfDay())->count();
        $usersPast24h = User::where('created_at', '>=', Carbon::now()->startOfDay())->count();
        $oneWeekAgo = Carbon::now()->subWeek();
        $currentRevenue = Order::where('created_at', '>=', Carbon::now()->startOfDay())->sum('billing_total');
        $mostSoldProductsWithNames = DB::table('order_product')
            ->select('products.name', DB::raw('COUNT(*) as total_sold'))
            ->join('products', 'order_product.product_id', '=', 'products.id')
            ->join('orders', 'order_product.order_id', '=', 'orders.id')
            ->where('orders.created_at', '>=', $oneWeekAgo)
            ->groupBy('products.name')
            ->orderByDesc('total_sold')
            ->limit(5)
            ->get();
        $topRatedProducts = Product::select('products.id', 'products.name')
            ->join('reviews', 'products.id', '=', 'reviews.product_id')
            ->selectRaw('AVG(reviews.rating) as average_rating')
            ->groupBy('products.id', 'products.name')
            ->orderByDesc('average_rating')
            ->take(10)
            ->get();



        return view('admin.index',compact('usersPast24h','ordersFromPastWeek','ordersPast24H','mostSoldProductsWithNames','currentRevenue','topRatedProducts'));
    }
}
