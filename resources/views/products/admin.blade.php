@extends('layouts.backend')

@section('page-title')
<section class="page-title">
    <div class="container">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="/">Home</a>
            <li class="active breadcrumb-item">Products List</li>
            </li>
        </ol>
    </div>
</section>
@endsection

@section('content')
<div class="clearfix mb-3">
    <a href="/products/create" class="btn btn-primary float-right">Add new product</a>
</div>
<div class="row ">
    @foreach ($products as $product)
    <div class="card col-md-4 p-3 " style="width: 18rem;">
        @if ($product->thumbnail)
        <img src="{{$product->thumbnail}}"  class="card-img-top mh-100 mw-100" alt="thumbnail">
        @else
        {{-- <img src="/assets/img/product/2.jpg"  class="mh-100 mw-100" alt="thumbnail"> --}}
        <h6>The product has no thumbnail</h6>
        @endif
        <div class="card-body">
            <h4 class="card-title">{{$product->name}}</h4>
            <h6 class="card-text">$$:{{$product->price}}</h6>
            <div class="toolbox">
                <a href="/products/show/{{$product->id}}" type="button" class="btn btn-primary">See More</a>
                <a href="/products/{{$product->id}}" type="button" class="btn btn-secondary">Edit</a>
                <button class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection