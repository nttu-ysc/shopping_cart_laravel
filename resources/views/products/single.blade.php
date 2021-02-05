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
                        @if ($product->discount)
                        <span class="border-tb p-tb-10">$${{round($product->price*$product->discount)}}
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
                                        <option>S</option>
                                        <option>M</option>
                                        <option>L</option>
                                        <option>XL</option>
                                    </select>
                                </span>
                            </li>
                        </ul>
                        <ul class="p-quantity m-bot-10 ">
                            <li>
                                <label>Quantity</label>
                            </li>
                            <li>
                                <input id="demo0" type="text" value="0" name="demo0" data-bts-min="0" data-bts-max="{{$product->quantity}}"
                                    data-bts-init-val="" data-bts-step="1" data-bts-decimal="0"
                                    data-bts-step-interval="100" data-bts-force-step-divisibility="round"
                                    data-bts-step-interval-delay="500" data-bts-prefix="" data-bts-postfix=""
                                    data-bts-prefix-extra-class="" data-bts-postfix-extra-class=""
                                    data-bts-booster="true" data-bts-boostat="10" data-bts-max-boosted-step="false"
                                    data-bts-mousewheel="true" data-bts-button-down-class="btn btn-default"
                                    data-bts-button-up-class="btn btn-default" />
                            </li>

                            </li>
                        </ul>
                    </div>

                    <div class="clearfix">
                        <a href="#" class="btn btn-medium btn-dark-solid  "><i class="fa fa-shopping-cart"></i> Add to
                            cart</a>
                    </div>
                </div>
            </div>
            <div class="row page-content">
                <div class="col-md-12">
                    <!--tabs border start-->
                    <section class="normal-tabs">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a data-toggle="tab" href="#tab-one">More Info</a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" href="#tab-two">Specification</a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" href="#tab-three">Review (2)</a>
                            </li>

                        </ul>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div id="tab-one" class="tab-pane active">
                                    <h4 class="text-uppercase">Product Description</h4>
                                    Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque
                                    mattis, leo quam aliquet diam, congue laoreet elit metus eget diam. Proin ac metus
                                    diam. In quis scelerisque velit. Proin pellentesque neque ut scelerisque dapibus.
                                    Praesent
                                    elementum feugiat dignissim. Nunc placerat mi id nisi interdum mollis. Praesent
                                    pharetra, justo ut scelerisque mattis, leo quam aliquet diam, congue laoreet elit
                                    metus eget diam. Proin ac metus diam. In quis
                                    scelerisque velit. Proin pellentesque neque ut scelerisque dapibus. Praesent
                                    elementum feugiat dignissim. Nunc placerat mi id nisi interdum mollis. Praesent
                                    pharetra, justo ut scelerisque mattis, leo quam aliquet
                                    diam, congue laoreet elit metus eget diam. Proin ac metus diam.
                                </div>
                                <div id="tab-two" class="tab-pane">
                                    <table class="table table-striped table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>Size</td>
                                                <td>Small, Medium, Large &amp; Extra Large</td>
                                            </tr>
                                            <tr>
                                                <td>Color</td>
                                                <td>Read, Blue, Green &amp; Black</td>
                                            </tr>
                                            <tr>
                                                <td>Chest</td>
                                                <td>38 inches</td>
                                            </tr>
                                            <tr>
                                                <td>Waist</td>
                                                <td>20 cm</td>
                                            </tr>
                                            <tr>
                                                <td>Length</td>
                                                <td>35 cm</td>
                                            </tr>
                                            <tr>
                                                <td>Fabric</td>
                                                <td>Cotton, Silk &amp; Synthetic</td>
                                            </tr>
                                            <tr>
                                                <td>Warranty</td>
                                                <td>6 Months</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                                <div id="tab-three" class="tab-pane">
                                    <ul class="media-list comments-list clearlist">

                                        <!-- comment item start-->
                                        <li class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object review-avatar" src="assets/img/post/a1.png"
                                                    alt="">
                                            </a>
                                            <div class="media-body">
                                                <div class="comment-info">
                                                    <div class="reviewer text-uppercase">
                                                        <a href="#">John Doe</a>
                                                    </div>
                                                    July 5, 2015, at 1:20
                                                    <span class="review-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </span>
                                                </div>

                                                <p>
                                                    Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum
                                                    facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers
                                                    sadips amets. rerum facilis dolores nemis omnis fugats vitaes nemo
                                                    minima rerums unsers sadips amets.
                                                </p>
                                            </div>
                                        </li>
                                        <!-- comment item end -->

                                        <!-- comment item -->
                                        <li class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object review-avatar" src="assets/img/post/a1.png"
                                                    alt="">
                                            </a>
                                            <div class="media-body">
                                                <div class="comment-info">
                                                    <div class="reviewer text-uppercase">
                                                        <a href="#">Margarita Smith</a>
                                                    </div>
                                                    July 5, 2015, at 1:30
                                                    <span class="review-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </span>
                                                </div>

                                                <p>
                                                    Perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                                    doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo
                                                    inventore veritatis et quasi architecto beatae vitae dicta sunt
                                                    explicabo..
                                                </p>
                                            </div>
                                        </li>
                                        <!-- comment item end -->

                                    </ul>

                                    <!--add review start-->
                                    <div class="heading-title-alt text-left heading-border-bottom">
                                        <h4 class="text-uppercase">ADD REVIEW</h4>
                                    </div>

                                    <form method="post" action="#" id="form" role="form" class="blog-comments">

                                        <div class="row">

                                            <div class="col-md-6 form-group">
                                                <!-- Name -->
                                                <input type="text" name="name" id="name" class=" form-control"
                                                    placeholder="Name *" maxlength="100" required="">
                                            </div>

                                            <div class="col-md-6 form-group">
                                                <!-- Email -->
                                                <input type="email" name="email" id="email" class=" form-control"
                                                    placeholder="Email *" maxlength="100" required="">
                                            </div>


                                            <div class="form-group col-md-12">
                                                <select class="form-control">
                                                    <option value="">Rating -- Select One --</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>

                                            <!-- Comment -->
                                            <div class="form-group col-md-12">
                                                <textarea name="text" id="text" class=" form-control" rows="6"
                                                    placeholder="Comment" maxlength="400"></textarea>
                                            </div>

                                            <!-- Send Button -->
                                            <div class="form-group col-md-12">
                                                <button type="submit" class="btn btn-small btn-dark-solid ">
                                                    Submit Review
                                                </button>
                                            </div>


                                        </div>

                                    </form>
                                    <!--add review end-->

                                </div>
                            </div>
                        </div>
                    </section>
                    <!--tabs border end-->
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