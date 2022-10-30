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
            return redirect()->route('products')->with('success', 'Done checkout');
        }else{
            return redirect()->route('products');
        }
    }

    public function index()
    {
        $title = 'Orders';
        if (auth()->user()->type == 'admin') {
            $orders = Order::with('items')->paginate(10);
        }else{
            $orders = Order::with('items')->where('user_id',auth()->user()->id)->paginate(10);
        }
        return view('pages.orders.index',compact('orders','title'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
