<?php
namespace App\Http\Controllers;
use App\Http\Requests\StoreReviewRequest;
use App\Models\Product;
use App\Models\Review;
class ReviewController extends Controller {
    public function store(StoreReviewRequest $request, Product $product){ Review::updateOrCreate(['user_id'=>auth()->id(),'product_id'=>$product->id],$request->validated()); return back()->with('success','Оценка сохранена'); }
}
