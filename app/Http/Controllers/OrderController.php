<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkout()
    {
        $cart = session('cart');
        if ($cart) {
            $order = new Order();
            $order->user_id = auth()->user()->id;
            $order->save();
            foreach ($cart  as $id => $details) {
                $item = new OrderItem();
                $item->order_id = $order->id;
                $item->product_id = $id;
                $item->qty = $details['quantity'];
                $item->total = $details['quantity'] * $details['price'];
                $item->save();
            }
            session()->forget('cart');
            addToActivity(auth()->user()->id,'Check out');
            return redirect()->route('products')->with('success', 'Done checkout');
        }else{
            return redirect()->route('products');
        }
    }

    public function index($status = null)
    {
        $orders = Order::query();
        $title = 'Orders';
        if(auth()->user()->type != 'admin'){
            $orders->where('user_id',auth()->user()->id);
        }
        if ($status != null){
            if (in_array($status,['pending','paid','canceled'])) {
                $title = ucfirst($status).' Orders';
                $orders->where('status',$status);
            }
        }
        $orders = $orders->paginate(10);
        return view('pages.orders.index',compact('orders','title'));
    }
    public function changeOrder(Order $order,$status)
    {
        if ($order->user_id == auth()->user()->id && in_array($status,['pending','paid','canceled']) && $order->status == 'pending') {
            $order->status = $status;
            $order->save();
            addToActivity(auth()->user()->id,'Change Status of Order to '.$status);
            return back()->with('success', 'Order is '.$status.' successfully');
        }else{
            abort(403);
        }
    }
}
