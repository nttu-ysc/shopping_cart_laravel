@extends('layouts.frontend')
@section('page-title')
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-uppercase">Shop Cart</h4>
                <ol class="breadcrumb">
                    <li><a href="/">Shop</a>
                    </li>
                    <li><a href="/carts">Shop Cart</a></li>
                    <li class="active">Shop order</li>
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
                                @foreach ($items as $item)
                                @foreach ($item as $sku)
                                <tr data-id="{{$sku['item']->id}}">
                                    <td>
                                        <div class="cart-img">
                                            <a href="/products/{{$sku['item']->id}}">
                                                <img src="{{$sku['item']->thumbnail}}" alt="">
                                            </a>
                                        </div>
                                    </td>
                                    <td><a href="/products/{{$sku['item']->id}}">{{$sku['item']->name}}</a>
                                    </td>
                                    <td>{{$sku['sku']->size}}/{{$sku['sku']->color}}</td>
                                    <td>{{$sku['item']->discount}}</td>
                                    <td>
                                        <div class="cart-action">
                                            <div class=" cart-quantity" style="margin-right: 0px">
                                                {{$sku['quantity']}}
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{$sku['item']->discountPrice()}}
                                        @if ($sku['item']->discount) <del>{{$sku['item']->price}}</del> @endif</td>
                                    <td>{{$sku['price']}}</td>
                                </tr>
                                @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if ($items)
                    <div class="clearfix">
                        <ul class="portfolio-meta m-bot-30 pull-right">
                            <li><span> Total Quantity </span> {{$totalQuantity}}</li>
                            <li><span><strong class="cart-total"> Total </strong></span> <strong class="cart-total">$
                                    {{$totalPrice}}</strong>
                            </li>
                        </ul>
                    </div>
                    @endif

                    <form class="form-horizontal" action="/orders" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 control-label">First Name *</label>
                            <div class="col-sm-10">
                                <input class="form-control" placeholder="First Name" name="firstName"
                                    value="{{Auth::user()->firstName}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Last Name *</label>
                            <div class="col-sm-10">
                                <input class="form-control" placeholder="Last Name" name="lastName"
                                    value="{{Auth::user()->lastName}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Mobile Number *</label>
                            <div class="col-sm-10">
                                <input type="tel" class="form-control" placeholder="Mobile Number" name="mobile"
                                    required value="{{Auth::user()->mobile}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email *</label>
                            <div class="col-sm-10">
                                @auth
                                <div class="input-group-addon form-control" name="email" style="text-align:left">
                                    {{Auth::user()->email}}</div>
                                @endauth
                                @guest
                                <input type="email" class="form-control" placeholder="Email" name="email" required>
                                @endguest
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Country *</label>
                            <div class="col-sm-10">
                                <input class="form-control" placeholder="Country" name="country"
                                    value="{{Auth::user()->country}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Address *</label>
                            <div class="col-sm-10">
                                <input class="form-control" placeholder="Address" name="address"
                                    value="{{Auth::user()->address}}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Remark</label>
                            <div class="col-sm-10">
                                <textarea name="remark" class="form-control" cols="100" rows="10"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Order</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection