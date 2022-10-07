<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EcomReview;
use App\Models\EcomProduct;
use Auth;
use DB;

class EcomReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reviews = EcomReview::orderBy('created_at', 'desc')->paginate(15);
        return view('backend.product.reviews.index', compact('reviews'));
    }


    public function seller_reviews()
    {
        $reviews = DB::table('ecom_reviews')
                    ->orderBy('id', 'desc')
                    ->join('ecom_products', 'ecom_reviews.product_id', '=', 'ecom_products.id')
                    ->where('ecom_products.user_id', Auth::user()->id)
                    ->select('ecom_reviews.id')
                    ->distinct()
                    ->paginate(9);

        foreach ($reviews as $key => $value) {
            $review = \App\EcomReview::find($value->id);
            $review->viewed = 1;
            $review->save();
        }

        return view('frontend.user.seller.reviews', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $review = new EcomReview;
        $review->product_id = $request->product_id;
        $review->user_id = Auth::user()->id;
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->viewed = '0';
        if($review->save()){
            $product = EcomProduct::findOrFail($request->product_id);
            if(count(EcomReview::where('product_id', $product->id)->where('status', 1)->get()) > 0){
                $product->rating = EcomReview::where('product_id', $product->id)->where('status', 1)->sum('rating')/count(EcomReview::where('product_id', $product->id)->where('status', 1)->get());
            }
            else {
                $product->rating = 0;
            }
            $product->save();
            flash(translate('Review has been submitted successfully'))->success();
            return back();
        }
        flash(translate('Something went wrong'))->error();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updatePublished(Request $request)
    {
        $review = EcomReview::findOrFail($request->id);
        $review->status = $request->status;
        if($review->save()){
            $product = EcomProduct::findOrFail($review->product->id);
            if(count(EcomReview::where('product_id', $product->id)->where('status', 1)->get()) > 0){
                $product->rating = EcomReview::where('product_id', $product->id)->where('status', 1)->sum('rating')/count(EcomReview::where('product_id', $product->id)->where('status', 1)->get());
            }
            else {
                $product->rating = 0;
            }
            $product->save();
            return 1;
        }
        return 0;
    }
}
