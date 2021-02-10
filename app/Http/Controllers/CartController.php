<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cart;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $oldCart = session('cart', null);
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
        return view(
            'carts.index',
            [
                'items' => $this->cart->items,
                'totalQuantity' => $this->cart->totalQuantity,
                'totalPrice' => $this->cart->totalPrice
            ]
        );
    }

    public function addItemToCart($id)
    {
        $product = Product::find($id);
        $this->cart->add($product, $id);
        Session::put('cart', $this->cart);
        $this->storeToDatabase($id);
        return redirect('/');
    }

    public function removeItem(Request $request, $id)
    {
        $this->cart->removeItem($id);
        $request->session()->put('cart', $this->cart);
        $this->storeToDatabase($id);
        return redirect()->action([CartController::class, 'index']);
    }

    public function increaseByOne(Request $request, $id)
    {
        $this->cart->increaseByOne($id);
        $request->session()->put('cart', $this->cart);
        $this->storeToDatabase($id);
        return redirect()->action([CartController::class, 'index']);
    }

    public function decreaseByOne(Request $request, $id)
    {
        $this->cart->decreaseByOne($id);
        $request->session()->put('cart', $this->cart);
        $this->storeToDatabase($id);
        return redirect()->action([CartController::class, 'index']);
    }

    public function updateQuantity(Request $request, $id)
    {
        $this->cart->updateQuantity($id, $request->quantity);
        $request->session()->put('cart', $this->cart);
        $this->storeToDatabase($id);
    }

    public function addQuantity(Request $request, $id)
    {
        $product = Product::find($id);
        $this->cart->addQuantity($id, $request->quantity, $product);
        $request->session()->put('cart', $this->cart);
        $this->storeToDatabase($id);
    }

    public function storeToDatabase($id)
    {
        if (Auth::check()) {
            if (!isset($this->cart->items[$id])) {
                $cart = Cart::where(['product_id' => $id, 'user_id' => Auth::id()])->first();
                $cart->delete();
            }
            foreach ($this->cart->items as $id => $item) {
                Cart::updateOrCreate(
                    [
                        'item' => $item['item']->name,
                        'user_id' => Auth::id(),
                    ],
                    [
                        'quantity' => $item['quantity'],
                        'user_id' => Auth::id(),
                        'product_id' => $id,
                    ]
                );
            }
        }
    }
}
