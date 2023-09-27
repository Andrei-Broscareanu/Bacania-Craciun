<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class AdminReviewController extends Controller
{
    public function index(){
        $reviews = Review::paginate(10);

        return response()
            ->view('admin.reviews.index', [
                'reviews' => $reviews
            ]);
    }

    public function show(Review $review)
    {
        return response()
            ->view('admin.reviews.show', [
                'review' => $review
            ]);
    }

    public function update(Request $request){
        $review = Review::where('id',$request->review_id)->first();

        if($review->approval_status != $request->status){
            $review->approval_status = $request->status;
            $review->update();
        }

        return back();

    }

    public function destroy(Review $review){
        $review->delete();
        return redirect('/admin/reviews');
    }



}
