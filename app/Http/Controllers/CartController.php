<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        return view(
            'carts.index',
            [
                'items' => $cart->items,
                'totalQuantity' => $cart->totalQuantity,
                'totalPrice' => $cart->totalPrice
            ]
        );
    }

    public function addItemToCart($id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        Session::put('cart', $cart);
        return redirect('/');
    }

    public function removeItem(Request $request, $id)
    {
        $oldCart = $request->session()->get('cart', null);
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        $request->session()->put('cart', $cart);
        return redirect()->action([CartController::class, 'index']);
    }

    public function increaseByOne(Request $request, $id)
    {
        $oldCart = $request->session()->get('cart', null);
        $cart = new Cart($oldCart);
        $cart->increaseByOne($id);
        $request->session()->put('cart', $cart);
        return redirect()->action([CartController::class, 'index']);
    }

    public function decreaseByOne(Request $request, $id)
    {
        $oldCart = $request->session()->get('cart', null);
        $cart = new Cart($oldCart);
        $cart->decreaseByOne($id);
        $request->session()->put('cart', $cart);
        return redirect()->action([CartController::class, 'index']);
    }

    public function updateQuantity(Request $request, $id)
    {
        $oldCart = $request->session()->get('cart', null);
        $cart = new Cart($oldCart);
        $cart->updateQuantity($id, $request->quantity);
        $request->session()->put('cart', $cart);
    }

    public function addQuantity(Request $request, $id)
    {
        $oldCart = $request->session()->get('cart', null);
        $cart = new Cart($oldCart);
        $product = Product::find($id);
        $cart->addQuantity($id, $request->quantity, $product);
        $request->session()->put('cart', $cart);
    }
}
