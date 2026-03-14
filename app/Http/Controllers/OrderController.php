<?php
namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class OrderController extends Controller {
    public function create(){
        $cart = session('cart', []); abort_if(empty($cart), 400, 'Корзина пуста'); $products = Product::whereIn('id', array_keys($cart))->get();
        $items = $products->map(fn($product)=>['product'=>$product,'quantity'=>$cart[$product->id]['quantity'],'subtotal'=>$product->price * $cart[$product->id]['quantity']]);
        return view('orders.create',['items'=>$items,'total'=>$items->sum('subtotal')]);
    }
    public function store(Request $request): RedirectResponse {
        $cart = session('cart', []); abort_if(empty($cart), 400, 'Корзина пуста'); $products = Product::whereIn('id', array_keys($cart))->get();
        $total = $products->sum(fn($product)=>$product->price * $cart[$product->id]['quantity']);
        DB::transaction(function() use ($products,$cart,$total){
            $order = Order::create(['user_id'=>auth()->id(),'order_number'=>'ORD-'.now()->format('Ymd').'-'.strtoupper(Str::random(6)),'ordered_at'=>now(),'status'=>'new','total_amount'=>$total]);
            foreach ($products as $product) OrderItem::create(['order_id'=>$order->id,'product_id'=>$product->id,'quantity'=>$cart[$product->id]['quantity'],'price'=>$product->price]);
        });
        session()->forget('cart');
        return redirect('/my-orders')->with('success','Заказ успешно создан');
    }
    public function myOrders(){ return view('orders.my',['orders'=>Order::with('items.product')->where('user_id',auth()->id())->latest()->get()]); }
}
