<?php

namespace App\Http\Controllers;

use App\Enums\ReviewStatus;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function shop(Request $request)
    {
        $paginate = 6;
        $categoryName = null;
        if(request()->category){
            $products = Product::with('categories')->whereHas('categories',function($query){
                $query->where('name',request()->category);
            })->where('published', 1);
            $categories = Category::all();
            $categoryName = optional($categories->where('name', $request->category)->first())->name;
        } else {
            $products = Product::search($request->query('search'))
                ->where('published', 1)
                ->take(5);
            $categories = Category::all();
        }

        if(request()->sort == 'low_high'){
            $products = $products->orderBy('price')->paginate($paginate);
        } elseif(request()->sort == 'high_low'){
            $products = $products->orderBy('price','desc')->paginate($paginate);
        } else {
            $products = $products->paginate($paginate);
        }

        $topProducts = Product::all()->where('featured',1)->where('published',1)->take(3);
        $topRatedProducts = Product::select('products.id', 'products.name','products.price')
            ->join('reviews', 'products.id', '=', 'reviews.product_id')
            ->selectRaw('AVG(reviews.rating) as average_rating')
            ->groupBy('products.id', 'products.name','products.price')
            ->orderByDesc('average_rating')
            ->take(3)
            ->get();

        return view('products.shop')->with([
            'products'=>$products,
            'categories'=>$categories,
            'categoryName' => $categoryName,
            'topProducts' => $topProducts,
            'topRatedProducts' => $topRatedProducts,
        ]);
    }

    public function show($slug)
    {
        $product = Product::where('slug',$slug)->first();
        $reviews = $product->reviews()->where('approval_status', ReviewStatus::Approved)->get();
        $averageRating = Review::where('product_id',$product->id)->avg('rating');
        if(!request()->user()){
            session()->put('url.intended',url()->current());
        }
        $productId = $product->id;
        if($product->quantity > 5){
            $stockLevel = 'In Stoc';
        } elseif($product->quantity <= 5 && $product->quantity > 0) {
            $stockLevel = 'Stoc redus';
        } else {
            $stockLevel = 'Nu este disponibil';
        }
        $categoryIds = $product->categories()->pluck('categories.id');
        $relatedProducts = Product::whereHas('categories', function ($query) use ($categoryIds) {
            $query->whereIn('categories.id', $categoryIds);
        })->where('id', '<>', $product->id)->limit(5)->get();



        return view('products.show', compact('product','relatedProducts' , 'stockLevel','reviews','averageRating'));
    }
}




