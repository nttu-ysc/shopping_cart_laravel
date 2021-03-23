@extends('layouts.frontend')

@section('page-title')
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-uppercase">Order</h4>
                <ol class="breadcrumb">
                    <li><a href="/">Shop</a>
                    </li>
                    <li class="active">Order list</li>
                </ol>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<section class="body-content ">

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Items</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Paid</th>
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
                                    @if ($order->paid)
                                    <td>Paid</td>
                                    @else
                                    <td>Not Paid</td>
                                    @endif
                                    <td>
                                        <a href="/orders/{{$order->id}}" class="btn btn-primary">See More</a>
                                        @if (!$order->paid)
                                        <a href="/orders/{{$order->id}}/pay" class="btn btn-danger">Pay</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>
@endsection