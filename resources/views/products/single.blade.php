@extends('layouts.frontend')

@section('page-title')
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-uppercase">Shop Single</h4>
                <ol class="breadcrumb">
                    <li><a href="/">Products List</a>
                    </li>
                    <li class="active">Shop Single</li>
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
                <div class="col-md-5">
                    <div class="post-list-aside">
                        <div class="post-single">
                            <div class="post-slider-thumb post-img text-center">
                                <ul class="slides">
                                    <li data-thumb="assets/img/product/8.jpg">
                                        <a href="javascript:;" title="Freshness Photo">
                                            <img src="{{$product->thumbnail}}" alt="" />
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="product-title">
                        <h2 class="text-uppercase">{{$product->name}}</h2>
                    </div>

                    <div class="product-price txt-xl">
                        @if (round($product->discount, 2) > 0)
                        <span class="border-tb p-tb-10">$${{$product->discountPrice()}}
                            <del>{{$product->price}}</del></span>
                        @else
                        <span class="border-tb p-tb-10">$${{$product->price}}</span>
                        @endif
                    </div>

                    <ul class="portfolio-meta m-bot-10 m-top-10">
                        <li><span> Item No </span> 09087</li>
                        <li><span> Condition </span> New</li>
                        <li><span> Max Quantity </span> {{$product->quantity}}</li>
                    </ul>
                    <p>
                        {{$product->description}}
                    </p>

                    <ul class="portfolio-meta m-bot-10 stock">
                        <li><span><span class="status">In
                                    Stock</span>
                        </li>
                    </ul>
                    <div class="p-values">
                        <ul class="portfolio-meta m-bot-10 ">
                            <li>
                                <span> Size </span>
                                <span>
                                    <select class="form-control">
                                        <option>{{$product->size}}</option>
                                    </select>
                                </span>
                            </li>
                        </ul>
                        <ul class="p-quantity m-bot-10 ">
                            <li>
                                <label>Quantity</label>
                            </li>
                            <li>
                                <input id="demo0" type="text" value="0" name="demo0" data-bts-min="1"
                                    data-bts-max="{{$product->quantity}}" data-bts-init-val="" data-bts-step="1"
                                    data-bts-decimal="0" data-bts-step-interval="100"
                                    data-bts-force-step-divisibility="round" data-bts-step-interval-delay="500"
                                    data-bts-prefix="" data-bts-postfix="" data-bts-prefix-extra-class=""
                                    data-bts-postfix-extra-class="" data-bts-booster="true" data-bts-boostat="10"
                                    data-bts-max-boosted-step="false" data-bts-mousewheel="true"
                                    data-bts-button-down-class="btn btn-default"
                                    data-bts-button-up-class="btn btn-default" />
                            </li>

                            </li>
                        </ul>
                    </div>

                    <div class="clearfix addToCart" data-id='{{$product->id}}'>
                        <a href="#" class="btn btn-medium btn-dark-solid  "><i class="fa fa-shopping-cart"></i> Add to
                            cart</a>
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