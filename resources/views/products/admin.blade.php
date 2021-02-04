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
<div class="container">
    <div class="clearfix">
        <a href="/products/create" class="btn btn-primary float-right">Add new product</a>
    </div>
    <div class="list-group mt-3">
        @foreach ($products as $product)
        <a href="#" class="list-group-item list-group-item-action">{{$product->name}}</a>
        @endforeach
    </div>
    @endsection