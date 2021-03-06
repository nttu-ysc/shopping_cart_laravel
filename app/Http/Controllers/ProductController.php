<?php

namespace App\Http\Controllers;

use App\Http\Requests\PriceFilterRequest;
use App\Http\Requests\StoreProduct;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sku;
use App\Models\Tag;
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

        $this->middleware('can:admin')->except([
            'index',
            'indexWithCategory',
            'indexWithTag',
            'show',
            'search',
            'priceFilter',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(9);
        $categories = Category::all();
        $tags = Tag::has('products')->withCount('products')->orderByDesc('products_count')->get();
        return view(
            'products.index',
            [
                'products' => $products,
                'categories' => $categories,
                'tags' => $tags,
                'items' => $this->cart->items,
                'totalQuantity' => $this->cart->totalQuantity,
                'totalPrice' => $this->cart->totalPrice,
            ]
        );
    }

    public function indexWithCategory(Category $category)
    {
        $products = Product::where('category_id', $category->id)->orderBy('id')->paginate(9);
        $categories = Category::all();
        $tags = Tag::has('products')->withCount('products')->orderByDesc('products_count')->get();
        return view(
            'products.index',
            [
                'products' => $products,
                'categories' => $categories,
                'tags' => $tags,
                'items' => $this->cart->items,
                'totalQuantity' => $this->cart->totalQuantity,
                'totalPrice' => $this->cart->totalPrice,
            ]
        );
    }

    public function indexWithTag(Tag $tag)
    {
        $products = $tag->products()->paginate(9);
        $categories = Category::all();
        $tags = Tag::has('products')->withCount('products')->orderByDesc('products_count')->get();
        return view(
            'products.index',
            [
                'products' => $products,
                'categories' => $categories,
                'tags' => $tags,
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
        $categories = Category::all();
        return view('products.create', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        $request->validate([
            'thumbnail' => 'required',
            'size' => 'required',
            'color' => 'required',
        ]);
        $product = new Product;
        if ($request->file('thumbnail')) {
            $path = $request->file('thumbnail')->store('public');
            $path = str_replace('public/', '/storage/', $path);
            $product->thumbnail = $path;
        }

        $product->fill($request->all());
        $product->user_id = Auth::id();
        $product->save();

        $sku = new Sku;
        $sku->fill($request->all());
        $sku->product_id = $product->id;
        $sku->save();

        $this->addTagsToProduct($request->tags, $product);
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
        $categories = Category::all();
        return view('products.edit', ['product' => $product, 'categories' => $categories]);
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

        if (isset($request->color))
            $sku = Sku::updateOrCreate(
                [
                    'product_id' => $product->id,
                    'size' => $request->size,
                    'color' => $request->color
                ],
                [
                    'product_id' => $product->id,
                    'size' => $request->size,
                    'color' => $request->color
                ]
            );

        $product->tags()->detach();
        $this->addTagsToProduct($request->tags, $product);
        return redirect('/products/admin');
    }

    private function addTagsToProduct($tags, $product)
    {
        $tags = explode('#', $tags);
        unset($tags[0]);
        foreach ($tags as $key => $tag) {
            $tags[$key] = trim($tag);
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $product->tags()->attach($tag->id);
        }
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
            foreach ($this->cart->items as $productId => $item) {
                foreach ($item as $skuId => $sku) {
                    Cart::updateOrCreate(
                        [
                            'item' => $sku['item']->name,
                            'user_id' => Auth::id(),
                            'sku_id' => $skuId,
                        ],
                        [
                            'quantity' => $sku['quantity'],
                            'user_id' => Auth::id(),
                            'product_id' => $productId,
                        ]
                    );
                }
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
        } else {
            return redirect()->back()->withErrors('There is no product match.');
        }
    }

    public function priceFilter(PriceFilterRequest $request)
    {
        $products = Product::where('price', '>=', $request->priceFrom)->where('price', '<=', $request->priceTo)
            ->orderBy('price', 'ASC')->paginate(9);
        $products->appends(['priceFrom' => $request->priceFrom, 'priceTo' => $request->priceTo]);
        $categories = Category::all();
        $tags = Tag::has('products')->withCount('products')->orderByDesc('products_count')->get();
        if ($products->count() == 0) {
            return redirect('/')->withErrors('There is no product match.');
        }

        return view(
            'products.index',
            [
                'products' => $products,
                'categories' => $categories,
                'tags' => $tags,
                'items' => $this->cart->items,
                'totalQuantity' => $this->cart->totalQuantity,
                'totalPrice' => $this->cart->totalPrice,
            ]
        );
    }
}