@extends('layouts.backend')

@section('page-title')
<section class="page-title">
    <div class="container">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="/">Home</a>
            <li class="active breadcrumb-item">Order List</li>
            </li>
        </ol>
    </div>
</section>
@endsection

@section('content')
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">First Name</th>
            <th scope="col">Items</th>
            <th scope="col">Price</th>
            <th scope="col">Country</th>
            <th scope="col">Address</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <th scope="row">{{$order->id}}</th>
            <td>{{$order->firstName}}</td>
            <td>{{$order->order_items_count}}</td>
            <td>{{$order->totalPrice()}}</td>
            <td>{{$order->country}}</td>
            <td>{{$order->address}}</td>
            <td>
                <a href="/orders/{{$order->id}}/showByAdmin" class="btn btn-primary">See More</a>
                <a href="/orders/{{$order->id}}/edit" class="btn btn-secondary">Edit</a>
                <button class="btn btn-danger" onclick="deleteOrder({{$order->id}})">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection