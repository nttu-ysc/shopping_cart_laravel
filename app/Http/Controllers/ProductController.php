<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $cart;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $oldCart = session('cart', null);
            $this->cart = new Cart;
            $this->cart->getItems($oldCart);
            if (Auth::check() && ($this->cart->loadCount < 1)) {
                $carts = Cart::where('user_id', Auth::id())->orderBy('product_id')->get();
                $this->cart->loadUserCart($carts);
                session(['cart' => $this->cart]);
                $this->storeToDatabase();
            }
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
        $products = Product::all();
        return view(
            'products.index',
            [
                'products' => $products,
                'items' => $this->cart->items,
                'totalQuantity' => $this->cart->totalQuantity,
                'totalPrice' => $this->cart->totalPrice,
            ]
        );
    }

    public function admin()
    {
        $products = Product::aLL();
        return view('products.admin', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product;
        return view('products.create', ['product' => $product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        $request->validate(['thumbnail' => 'required']);
        $product = new Product;
        if ($request->file('thumbnail')) {
            $path = $request->file('thumbnail')->store('public');
            $path = str_replace('public/', '/storage/', $path);
            $product->thumbnail = $path;
        }

        $product->fill($request->all());
        $product->user_id = Auth::id();
        $product->save();
        return redirect('/products/admin');
    }

    public function showByAdmin($id)
    {
        $product = Product::find($id);
        $discount = $product->discount * 100;
        return view('products.showByAdmin', ['product' => $product, 'discount' => $discount]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view(
            'products.single',
            [
                'product' => $product,
                'items' => $this->cart->items,
                'totalQuantity' => $this->cart->totalQuantity,
                'totalPrice' => $this->cart->totalPrice
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProduct $request, Product $product)
    {
        if ($request->file('thumbnail')) {
            $product->thumbnail = str_replace('/storage/', 'public/', $product->thumbnail);
            Storage::delete($product->thumbnail);

            $path = $request->file('thumbnail')->store('public');
            $path = str_replace('public/', '/storage/', $path);
            $product->thumbnail = $path;
        }

        $product->fill($request->all());
        $product->save();
        return redirect('/products/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->thumbnail = str_replace('/storage/', 'public/', $product->thumbnail);
        Storage::delete($product->thumbnail);
        $product->delete();
    }

    public function storeToDatabase()
    {
        if (Auth::check()) {
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

    public function search(Request $request)
    {
        $product = Product::where('name', $request->product)->first();
        if ($product) {
            return view(
                'products.single',
                [
                    'product' => $product,
                    'items' => $this->cart->items,
                    'totalQuantity' => $this->cart->totalQuantity,
                    'totalPrice' => $this->cart->totalPrice
                ]
            );
        }else{
            return redirect()->back()->withErrors('There is no product match.');
        }
    }
}
