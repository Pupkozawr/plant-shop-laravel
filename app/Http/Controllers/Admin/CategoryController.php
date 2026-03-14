<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Models\Category;
class CategoryController extends Controller {
    public function index(){ return view('admin.categories.index',['categories'=>Category::with('parent')->latest()->get()]); }
    public function create(){ return view('admin.categories.create',['categories'=>Category::all()]); }
    public function store(StoreCategoryRequest $request){ Category::create($request->validated()); return redirect()->route('admin.categories.index')->with('success','Категория создана'); }
    public function edit(Category $category){ return view('admin.categories.edit',['category'=>$category,'categories'=>Category::whereKeyNot($category->id)->get()]); }
    public function update(StoreCategoryRequest $request, Category $category){ $category->update($request->validated()); return redirect()->route('admin.categories.index')->with('success','Категория обновлена'); }
    public function destroy(Category $category){ $category->delete(); return back()->with('success','Категория удалена'); }
}
