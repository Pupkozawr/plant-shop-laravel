<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
class CartController extends Controller {
    public function index(){
        $cart = session('cart', []); $products = Product::whereIn('id', array_keys($cart))->get();
        $items = $products->map(fn($product)=>['product'=>$product,'quantity'=>$cart[$product->id]['quantity'] ?? 0,'subtotal'=>($cart[$product->id]['quantity'] ?? 0) * $product->price]);
        return view('cart.index',['items'=>$items,'total'=>$items->sum('subtotal')]);
    }
    public function add(Request $request, Product $product): RedirectResponse {
        $qty = max(1, (int)$request->input('quantity',1)); $cart = session('cart', []); $cart[$product->id]['quantity'] = ($cart[$product->id]['quantity'] ?? 0) + $qty; session(['cart'=>$cart]);
        return back()->with('success','Товар добавлен в корзину');
    }
    public function update(Request $request, Product $product): RedirectResponse {
        $cart = session('cart', []); if (isset($cart[$product->id])) { $cart[$product->id]['quantity'] = max(1, (int)$request->input('quantity',1)); session(['cart'=>$cart]); }
        return back()->with('success','Корзина обновлена');
    }
    public function remove(Product $product): RedirectResponse { $cart = session('cart', []); unset($cart[$product->id]); session(['cart'=>$cart]); return back()->with('success','Товар удален'); }
    public function clear(): RedirectResponse { session()->forget('cart'); return back()->with('success','Корзина очищена'); }
}
