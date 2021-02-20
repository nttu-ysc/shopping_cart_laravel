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
<div class="clearfix mb-3">
    <div class="toolbox float-right">
        <a href="/orders/admin" class="btn btn-primary">Back</a>
        <button class="btn btn-danger" onclick="deleteOrder({{$order->id}})">Delete</button>
    </div>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Product NO.</th>
            <th scope="col">Name</th>
            <th scope="col">Spec</th>
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
            <td>{{$item->productData['name']}}</td>
            <td>{{$item->productData['size']}}/{{$item->productData['color']}}</td>
            <td>
                {{$item->discountPrice()}}
                <small><del>{{$item->productData['price']}}</del></small>
            </td>
            <td>{{$item->productData['discount']}}</td>
            <td>{{$item->productData['quantity']}}</td>
            <td>{{$item->totalEachPrice()}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="row border-top border-primary pt-4">
    <dl class="row col-sm-9">
        <dt class="col-sm-3">Subscriber</dt>
        <dd class="col-sm-9">{{$order->firstName}} {{$order->lastName}}</dd>

        <dt class="col-sm-3">Mobile</dt>
        <dd class="col-sm-9">{{$order->mobile}}</dd>

        <dt class="col-sm-3">Email</dt>
        <dd class="col-sm-9"><a href="mailto:{{$order->email}}">{{$order->email}}</a></dd>

        <dt class="col-sm-3">Country</dt>
        <dd class="col-sm-9">{{$order->country}}</dd>

        <dt class="col-sm-3">Address</dt>
        <dd class="col-sm-9">{{$order->address}}</dd>

        <dt class="col-sm-3">Remark</dt>
        <dd class="col-sm-9">
            <p>{{$order->remark}}</p>
        </dd>
    </dl>
    <dl class="row col-sm-3">
        <dt class="col-sm-6">Total Quantity</dt>
        <dd class="col-sm-6">{{$order->totalQuantity()}}</dd>

        <dt class="col-sm-6">Total Price</dt>
        <dd class="col-sm-6">{{$order->totalPrice()}}</dd>
    </dl>
</div>
@endsection