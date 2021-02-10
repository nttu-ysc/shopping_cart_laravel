@extends('layouts.backend')

@section('page-title')
<section class="page-title">
    <div class="container">
        <h4 class="text-uppercase mt-3">Product</h4>
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="/">Home</a>
            <li class="breadcrumb-item"><a href="/products/admin">Products List</a></li>
            </li>
            <li class="active breadcrumb-item">Product</li>
            </li>
        </ol>
    </div>
</section>
@endsection

@section('content')
<div class="clearfix mb-3">
    <div class="toolbox float-right">
        <a href="/products/{{$product->id}}/edit" type="button" class="btn btn-secondary">Edit</a>
        <button class="btn btn-danger" onclick="deleteProduct({{$product->id}})">Delete</button>
    </div>
</div>
<ul class="list-group mb-3">
    <li class="list-group-item active">Title: {{$product->name}}</li>
    <li class="list-group-item">
        Category: @if ($product->category){{$product->category->name}} @else No category @endif
    </li>
    <li class="list-group-item">Size: {{$product->size}}</li>
    <li class="list-group-item">Price: {{$product->price}}</li>
    <li class="list-group-item">Discount @if ($product->discount ==0) No discount @else {{$discount.'%'}}</li> @endif
    <li class="list-group-item">Price after discount:
        @if ($product->discount ==0)
        {{$product->price}}
        @else
        {{$product->discountPrice()}}
        @endif
    </li>
    <li class="list-group-item">Quantity: {{$product->quantity}}</li>
    @if ($product->thumbnail)
    <li class="list-group-item">Thumbnail:
        <img width="300px" src="{{$product->thumbnail}}" alt="thumbnail">
    </li>
    @else
    <li class="list-group-item">This product has no thumbnail</li>
    @endif
</ul>

@endsection