<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
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
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        return view('products.single', ['product' => $product]);
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
    public function update(Request $request, Product $product)
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
        return redirect('products.admin');
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
}
