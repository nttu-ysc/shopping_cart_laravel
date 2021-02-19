@extends('layouts.frontend')

@section('page-title')
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-uppercase">Order {{$order->id}}</h4>
                <ol class="breadcrumb">
                    <li><a href="/">Shop</a>
                    </li>
                    <li><a href="/orders">Order list</a></li>
                    <li class="active">Order {{$order->id}}</li>
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
                        <table class="table cart-table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Spec</th>
                                    <th>Discount</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderItems as $orderItem)
                                <tr>
                                    <td>
                                        <div class="cart-img">
                                            <a href="/products/{{$orderItem->product_id}}">
                                                <img src="{{$orderItem->product->thumbnail}}" class="img-thumbnail"
                                                    alt="">
                                            </a>
                                        </div>
                                    </td>
                                    <td><a href="/products/{{$orderItem->product_id}}">{{$orderItem->name}}</a>
                                    </td>
                                    <td>{{$orderItem->sku->size}}/{{$orderItem->sku->color}}</td>
                                    <td>{{$orderItem->discount}}</td>
                                    <td>
                                        <div class="cart-action">
                                            <div class=" cart-quantity" style="margin-right: 0px">
                                                {{$orderItem->quantity}}
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{$orderItem->product->discountPrice()}}
                                        @if ($orderItem->discount) <del>{{$orderItem->price}}</del> @endif</td>
                                    <td>{{$orderItem->totalEachPrice()}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if ($orderItems)
                    <div class="clearfix">
                        <ul class="portfolio-meta m-bot-30 pull-right">
                            <li><span> Total Quantity </span> {{$order->totalQuantity()}}</li>
                            <li><span><strong class="cart-total"> Total </strong></span> <strong class="cart-total">$
                                    {{$order->totalPrice()}}</strong>
                            </li>
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</section>

@endsection