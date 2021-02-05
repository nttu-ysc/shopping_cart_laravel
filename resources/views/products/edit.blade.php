@extends('layouts.backend')

@section('page-title')
<section class="page-title">
    <div class="container">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="/">Home</a>
            <li class="breadcrumb-item"><a href="/products/admin">Products List</a>
            <li class="active breadcrumb-item">Edit</li>
            </li>
        </ol>
    </div>
</section>
@endsection

@section('content')
<form method="POST" action="/products/{{$product->id}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="put">
    <div class="form-group">
        <label>Product name</label>
        <input class="form-control" name="name" value="{{$product->name}}">
    </div>
    <div class="form-group">
        <label>Thumbnail</label>
        @if ($product->thumbnail)
        <img src="{{$product->thumbnail}}" alt="thumbnail" width="300px" class="mb-3">
        @endif
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="thumbnail">
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
    </div>
    <label>Size</label>
    <div class="form-group">
        <select class="form-control" name="size">
            <option selected>Please select a size</option>
            <option @if ($product->size == 'XS') selected @endif>XS</option>
            <option @if ($product->size == 'S') selected @endif>S</option>
            <option @if ($product->size == 'M') selected @endif>M</option>
            <option @if ($product->size == 'L') selected @endif>L</option>
            <option @if ($product->size == 'XL') selected @endif>XL</option>
        </select>
    </div>
    <div class="form-group">
        <label>Price</label>
        <input class="form-control" name="price" value="{{$product->price}}">
    </div>
    <div class="form-group">
        <label>Quantity</label>
        <input class="form-control" name="quantity" value="{{$product->quantity}}">
    </div>
    <div class="form-group">
        <label>Discount</label>
        <input class="form-control" placeholder="EX : 75%" name="discount" value="{{$product->discount}}">
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" cols="30" rows="10" name="description">{{$product->description}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="button" class="btn btn-danger" onclick="window.history.back()">Cancel</button>
</form>
@endsection