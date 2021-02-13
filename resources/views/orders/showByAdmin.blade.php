@extends('layouts.backend')

@section('page-title')
<section class="page-title">
    <div class="container">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="/">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="/orders/admin">Order List</a></li>
            <li class="active breadcrumb-item">Order {{$order->id}}</li>
        </ol>
    </div>
</section>
@endsection

@section('content')
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Product NO.</th>
            <th scope="col">Name</th>
            <th scope="col">Size</th>
            <th scope="col">Prize</th>
            <th scope="col">Discount</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)
        <tr>
            <th scope="row">{{$item->product_id}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->size}}</td>
            <td>
                {{$item->product->discountPrice()}}
                <small><del>{{$item->price}}</del></small>
            </td>
            <td>{{$item->discount}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->totalEachPrice()}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="clearfix">
    <ul class="list-group float-right">
        <li class="list-group-item ">
            <h3><small>Total Quantity: </small>{{$order->totalQuantity()}}</h3>
            <h3><small>Total Price: </small>{{$order->totalPrice()}}</h3>
        </li>
    </ul>
</div>
@endsection