<?php
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
class HomeController extends Controller {
    public function __invoke(){ return view('home.index',['categories'=>Category::withCount('products')->get(),'products'=>Product::where('is_active', true)->latest()->take(8)->get(),'recent'=>Product::whereIn('id', session('recently_viewed', []))->get()]); }
}
