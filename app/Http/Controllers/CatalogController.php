<?php
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
class CatalogController extends Controller {
    public function index(Request $request){
        $query = Product::with('category')->where('is_active', true);
        if ($request->filled('search')) { $search = $request->string('search'); $query->where(fn($q)=>$q->where('name','like',"%{$search}%")->orWhere('description','like',"%{$search}%")); }
        if ($request->filled('category')) $query->where('category_id', $request->integer('category'));
        return view('catalog.index',['products'=>$query->paginate(12)->withQueryString(),'categories'=>Category::all()]);
    }
    public function show(Product $product){
        $recent = collect(session('recently_viewed', []))->reject(fn($id)=>(int)$id === $product->id)->prepend($product->id)->take(6)->values()->all();
        session(['recently_viewed'=>$recent]);
        $product->load(['category','reviews.user']);
        return view('catalog.show',['product'=>$product,'recentProducts'=>Product::whereIn('id', array_diff($recent, [$product->id]))->get()]);
    }
}
