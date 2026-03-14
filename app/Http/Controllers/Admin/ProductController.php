<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
class ProductController extends Controller {
    public function index(){ return view('admin.products.index',['products'=>Product::with('category')->latest()->paginate(15)]); }
    public function create(){ return view('admin.products.create',['categories'=>Category::all()]); }
    public function store(StoreProductRequest $request){ Product::create(array_merge($request->validated(),['is_active'=>$request->boolean('is_active')])); return redirect()->route('admin.products.index')->with('success','Товар создан'); }
    public function edit(Product $product){ return view('admin.products.edit',['product'=>$product,'categories'=>Category::all()]); }
    public function update(StoreProductRequest $request, Product $product){ $product->update(array_merge($request->validated(),['is_active'=>$request->boolean('is_active')])); return redirect()->route('admin.products.index')->with('success','Товар обновлен'); }
    public function destroy(Product $product){ $product->delete(); return back()->with('success','Товар удален'); }
}
