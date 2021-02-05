@extends('layouts.backend')

@section('page-title')
<section class="page-title">
    <div class="container">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="/">Home</a>
            <li class="breadcrumb-item"><a href="/products/admin">Products List</a>
            <li class="active breadcrumb-item">Create</li>
            </li>
        </ol>
    </div>
</section>
@endsection

@section('content')
<form method="POST" action="/products" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Product name</label>
        <input class="form-control" name="name">
    </div>
    <div class="form-group">
        <label>Thumbnail</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="thumbnail">
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
    </div>
    <label>Size</label>
    <div class="form-group">
        <select class="form-control" name="size">
            <option selected>Please select a size</option>
            <option>XS</option>
            <option>S</option>
            <option>M</option>
            <option>L</option>
            <option>XL</option>
        </select>
    </div>
    <div class="form-group">
        <label>Price</label>
        <input class="form-control" name="price">
    </div>
    <div class="form-group">
        <label>Quantity</label>
        <input class="form-control" name="quantity">
    </div>
    <div class="form-group">
        <label>Discount</label>
        <input class="form-control" placeholder="EX : 75%" name="discount">
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" cols="30" rows="10" name="description"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="button" class="btn btn-danger" onclick="window.history.back()">Cancel</button>
</form>
@endsection