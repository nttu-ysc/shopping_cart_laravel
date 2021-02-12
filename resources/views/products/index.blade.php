@extends('layouts.frontend')

@section('page-title')
<section class="page-title">
    <div class="container">
        <h4 class="text-uppercase">
            Shop
            @if (request()->category)
            / {{ request()->category->name }}
            @endif
            @if (request()->is('products/price'))
            / price filter
            @endif
            @if (request()->tag)
            # {{ request()->tag->name }}
            @endif
        </h4>
        <ol class="breadcrumb">
            <li class="active">Products List</li>
            <li><a href="#">Product</a>
            </li>
        </ol>
    </div>
</section>
@endsection

@section('content')
<section class="body-content ">

    <div class="page-content product-grid">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <!--product option-->
                    <div class="clearfix m-bot-30 inline-block">

                        <div class="pull-left">
                            <form method="post" action="#">
                                <select class="form-control">
                                    <option>Default sorting</option>
                                    <option>Sort by popularity</option>
                                    <option>Sort by average ratings</option>
                                    <option>Sort by newness</option>
                                    <option>Sort by price: low to high</option>
                                    <option>Sort by price: high to low</option>
                                </select>
                            </form>
                        </div>

                        <div class="pull-left m-top-5 m-left-10">
                            Showing 1–10 of 55 results
                        </div>

                    </div>
                    <!--product option-->
                    <div class="row">
                        @foreach ($products as $product)
                        @if ($product->discount == 0)
                        <div class="col-md-4">
                            <!--product list-->
                            <div class="product-list">
                                <div class="product-img">
                                    <a href="/products/{{$product->id}}">
                                        <img src="{{$product->thumbnail}}" alt="" />
                                    </a>
                                </div>
                                <div class="product-title">
                                    <h5><a href="/products/{{$product->id}}">{{$product->name}}</a></h5>
                                </div>
                                <div class="product-price">
                                    {{$product->price}}
                                </div>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="product-btn"><a href="/carts/add/{{$product->id}}"
                                        class="btn btn-extra-small btn-dark-border  ">
                                        <i class="fa fa-shopping-cart"></i> Add to cart</a>
                                </div>
                            </div>
                            <!--product list-->
                        </div>
                        @else
                        <div class="col-md-4">
                            <!--product list-->
                            <div class="product-list">
                                <div class="product-img">
                                    <a href="/products/{{$product->id}}">
                                        <img src="{{$product->thumbnail}}" alt="" />
                                    </a>
                                    <div class="sale-label">
                                        Sale
                                    </div>
                                </div>
                                <div class="product-title">
                                    <h5><a href="/products/{{$product->id}}">{{$product->name}}</a></h5>
                                </div>
                                <div class="product-price">
                                    <del>{{$product->price}}</del> {{$product->discountPrice()}}
                                </div>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="product-btn"><a href="/carts/add/{{$product->id}}"
                                        class="btn btn-extra-small btn-dark-border">
                                        <i class="fa fa-shopping-cart"></i> Add to cart</a>
                                </div>
                            </div>
                            <!--product list-->
                        </div>
                        @endif
                        @endforeach


                        <div class="text-center col-md-12">
                            {{$products->links()}}
                        </div>

                    </div>
                </div>

                <div class="col-md-3 ">
                    @include('products.side_bar')
                </div>

            </div>
        </div>
    </div>


</section>
@endsection