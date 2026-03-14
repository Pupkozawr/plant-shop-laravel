<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Order;
class OrderController extends Controller {
    public function index(){ return view('admin.orders.index',['orders'=>Order::with(['user','items.product'])->latest()->paginate(15),'messages'=>ContactMessage::latest()->take(10)->get()]); }
}
