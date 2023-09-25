<?php

namespace App\Http\Controllers;

use App\Enums\ReviewStatus;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create(Request $request){
        if( $request->user()) {
            $product = Product::where('slug',$request->product)->first();
            $review = new Review();
            $review->user_id = $request->user()->id;
            $review->product_id = $product->id;
            $review->title = $request->title;
            $review->description = $request->review;
            $review->rating = $request->rating;
            $review->approval_status = ReviewStatus::Pending;
            $review->save();
        }
        return back();
    }

}
