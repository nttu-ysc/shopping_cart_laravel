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
                    <li class="active">Shop Cart</li>
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
                            @if ($items)
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
                                            <a href="/carts/decrease/{{$sku['item']->id}}"
                                                class="btn btn-default pull-left" style="margin-right: 0px">-</a>
                                            <input class="form-control cart-quantity" value="{{$sku['quantity']}}"
                                                style="margin-right: 0px" required />
                                            <a href="/carts/increase/{{$sku['item']->id}}" class="btn btn-default">+</a>
                                            <a href="/carts/remove/{{$sku['item']->id}}/{{$sku['sku']->id}}"
                                                class="btn btn-default" type="button"><i class="fa fa-trash-o"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{$sku['item']->discountPrice()}}
                                        @if ($sku['item']->discount) <del>{{$sku['item']->price}}</del> @endif</td>
                                    <td>{{$sku['price']}}</td>
                                </tr>
                                @endforeach
                                @endforeach
                            </tbody>
                            @else
                            <div>
                                No item!!
                            </div>
                            @endif
                        </table>
                    </div>

                    @if ($items)
                    <ul class="portfolio-meta m-bot-30 pull-right">
                        <li><span> Total Quantity </span> {{$totalQuantity}}</li>
                        <li><span><strong class="cart-total"> Total </strong></span> <strong class="cart-total">$
                                {{$totalPrice}}</strong>
                        </li>
                    </ul>
                    @endif

                    <div class="cart-btn-row inline-block">
                        @if ($items)
                        <a href="/orders/create" method='get' class="btn btn-medium btn-dark-solid pull-right "><i
                                class="fa fa-shopping-cart"></i> Checkout</a>
                        @endif
                        <a href="/" class="btn btn-medium btn-dark-solid btn-transparent  pull-right"> Continue Shopping
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>
@endsection

@section('script')
<script>
    $("input[name='demo0']").TouchSpin({});
</script>
@endsection