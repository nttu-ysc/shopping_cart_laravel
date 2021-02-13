<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    protected $cart;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $oldCart = session('cart');
            $this->cart = new Cart;
            $this->cart->getItems($oldCart);

            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Auth::user()->orders()->withCount('orderItems')->get();
        return view(
            'orders/index',
            [
                'orders' => $orders,
                'items' => $this->cart->items,
                'totalQuantity' => $this->cart->totalQuantity,
                'totalPrice' => $this->cart->totalPrice
            ]
        );
    }

    public function admin()
    {
        $orders = Order::withCount('orderItems')->get();
        return view('orders/admin', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carts = Auth::user()->carts;
        return view(
            'orders.create',
            [
                'carts' => $carts,
                'items' => $this->cart->items,
                'totalQuantity' => $this->cart->totalQuantity,
                'totalPrice' => $this->cart->totalPrice
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $order = new Order;
        $order->email = Auth::user()->email;
        $order->fill($request->all());
        $order->user_id = Auth::id();
        $order->save();

        Auth::user()->fill($request->all());
        Auth::user()->save();

        foreach (Auth::user()->carts as $item) {
            $orderItem = new OrderItem;
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item->product_id;
            $orderItem->name = $item->item;
            $orderItem->size = $item->product->size;
            $orderItem->price = $item->product->price;
            $orderItem->discount = $item->product->discount;
            $orderItem->quantity = $item->quantity;
            $orderItem->save();
            $item->delete();
        }
        $request->session()->forget('cart');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
    }

    public function showByAdmin($id)
    {
        $order = Order::find($id);
        $items = $order->orderItems()->orderBy('product_id')->get();
        return view('orders.showByAdmin', ['items' => $items, 'order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        //
    }
}
