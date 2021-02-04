@extends('layouts.frontend')

@section('page-title')
<section class="page-title">
    <div class="container">
        <h4 class="text-uppercase">Shop</h4>
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
                        <div class="col-md-4">
                            <!--product list-->
                            <div class="product-list">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="assets/img/product/1.jpg" alt="" />
                                    </a>
                                    <a href="#">
                                        <img src="assets/img/product/1-alt.jpg" alt="" />
                                    </a>
                                    <div class="sale-label">
                                        Sale
                                    </div>
                                </div>
                                <div class="product-title">
                                    <h5><a href="#">CROPPED SKINNY ISA JEANS</a></h5>
                                </div>
                                <div class="product-price">
                                    <del>$79.00</del> $59.99
                                </div>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="product-btn">
                                    <a href="#" class="btn btn-extra-small btn-dark-border  "><i
                                            class="fa fa-shopping-cart"></i> Add to cart</a>
                                </div>
                            </div>
                            <!--product list-->
                        </div>
                        <div class="col-md-4">
                            <!--product list-->
                            <div class="product-list">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="assets/img/product/2.jpg" alt="" />
                                    </a>
                                    <a href="#">
                                        <img src="assets/img/product/2-alt.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-title">
                                    <h5><a href="#">full sleeve cotton shirt</a></h5>
                                </div>
                                <div class="product-price">
                                    $49.99
                                </div>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="product-btn">
                                    <a href="#" class="btn btn-extra-small btn-dark-border  "><i
                                            class="fa fa-shopping-cart"></i> Add to cart</a>
                                </div>
                            </div>
                            <!--product list-->
                        </div>
                        <div class="col-md-4">
                            <!--product list-->
                            <div class="product-list">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="assets/img/product/3.jpg" alt="" />
                                    </a>
                                    <a href="#">
                                        <img src="assets/img/product/3-alt.jpg" alt="" />
                                    </a>
                                    <div class="sale-label">
                                        Sale
                                    </div>
                                </div>
                                <div class="product-title">
                                    <h5><a href="#">OPENWORK TRIMS DRESS</a></h5>
                                </div>
                                <div class="product-price">
                                    <del>$210.00</del> $179.99
                                </div>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </div>
                                <div class="product-btn">
                                    <a href="#" class="btn btn-extra-small btn-dark-border  "><i
                                            class="fa fa-shopping-cart"></i> Add to cart</a>
                                </div>
                            </div>
                            <!--product list-->
                        </div>
                        <div class="col-md-4">
                            <!--product list-->
                            <div class="product-list">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="assets/img/product/4.jpg" alt="" />
                                    </a>
                                    <a href="#">
                                        <img src="assets/img/product/4-alt.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-title">
                                    <h5><a href="#">full sleeve cotton t-shirt</a> </h5>
                                </div>
                                <div class="product-price">
                                    $39.99
                                </div>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </div>
                                <div class="product-btn">
                                    <a href="#" class="btn btn-extra-small btn-dark-border  "><i
                                            class="fa fa-shopping-cart"></i> Add to cart</a>
                                </div>
                            </div>
                            <!--product list-->
                        </div>
                        <div class="col-md-4">
                            <!--product list-->
                            <div class="product-list">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="assets/img/product/5.jpg" alt="" />
                                    </a>
                                    <a href="#">
                                        <img src="assets/img/product/5-alt.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-title">
                                    <h5><a href="#">SHOULDER DETAIL DRESS</a></h5>
                                </div>
                                <div class="product-price">
                                    $59.99
                                </div>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="product-btn">
                                    <a href="#" class="btn btn-extra-small btn-dark-border  "><i
                                            class="fa fa-shopping-cart"></i> Add to cart</a>
                                </div>
                            </div>
                            <!--product list-->
                        </div>
                        <div class="col-md-4">
                            <!--product list-->
                            <div class="product-list">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="assets/img/product/6.jpg" alt="" />
                                    </a>
                                    <a href="#">
                                        <img src="assets/img/product/6-alt.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-title">
                                    <h5><a href="#">SLEEVE COTTON SWEAT SHIRT</a></h5>
                                </div>
                                <div class="product-price">
                                    $69.99
                                </div>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </div>
                                <div class="product-btn">
                                    <a href="#" class="btn btn-extra-small btn-dark-border  "><i
                                            class="fa fa-shopping-cart"></i> Add to cart</a>
                                </div>
                            </div>
                            <!--product list-->
                        </div>
                        <div class="col-md-4">
                            <!--product list-->
                            <div class="product-list">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="assets/img/product/7.jpg" alt="" />
                                    </a>
                                    <a href="#">
                                        <img src="assets/img/product/7-alt.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-title">
                                    <h5><a href="#">CROPPED SKINNY ISA JEANS</a></h5>
                                </div>
                                <div class="product-price">
                                    $59.99
                                </div>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="product-btn">
                                    <a href="#" class="btn btn-extra-small btn-dark-border  "><i
                                            class="fa fa-shopping-cart"></i> Add to cart</a>
                                </div>
                            </div>
                            <!--product list-->
                        </div>
                        <div class="col-md-4">
                            <!--product list-->
                            <div class="product-list">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="assets/img/product/8.jpg" alt="" />
                                    </a>
                                    <a href="#">
                                        <img src="assets/img/product/8-alt.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-title">
                                    <h5><a href="#">full sleeve cotton shirt</a></h5>
                                </div>
                                <div class="product-price">
                                    $49.99
                                </div>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <div class="product-btn">
                                    <a href="#" class="btn btn-extra-small btn-dark-border  "><i
                                            class="fa fa-shopping-cart"></i> Add to cart</a>
                                </div>
                            </div>
                            <!--product list-->
                        </div>
                        <div class="col-md-4">
                            <!--product list-->
                            <div class="product-list">
                                <div class="product-img">
                                    <a href="#">
                                        <img src="assets/img/product/1.jpg" alt="" />
                                    </a>
                                    <a href="#">
                                        <img src="assets/img/product/1-alt.jpg" alt="" />
                                    </a>
                                    <div class="sale-label">
                                        Sale
                                    </div>
                                </div>
                                <div class="product-title">
                                    <h5><a href="#">OPENWORK TRIMS DRESS</a></h5>
                                </div>
                                <div class="product-price">
                                    <del>$220.00</del> $179.99
                                </div>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </div>
                                <div class="product-btn">
                                    <a href="#" class="btn btn-extra-small btn-dark-border  "><i
                                            class="fa fa-shopping-cart"></i> Add to cart</a>
                                </div>
                            </div>
                            <!--product list-->
                        </div>

                        <div class="text-center col-md-12">
                            <ul class="pagination custom-pagination">
                                <li><a href="#">Prev</a>
                                </li>
                                <li class="active"><a href="#">1</a>
                                </li>
                                <li><a href="#">2</a>
                                </li>
                                <li><a href="#">3</a>
                                </li>
                                <li><a href="#">4</a>
                                </li>
                                <li><a href="#">5</a>
                                </li>
                                <li><a href="#">Next</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

                <div class="col-md-3 ">
                    <!--product category-->
                    <div class="widget">
                        <div class="heading-title-alt text-left heading-border-bottom">
                            <h6 class="text-uppercase">product category</h6>
                        </div>
                        <ul class="widget-category">
                            <li><a href="#">Accessories</a>
                            </li>
                            <li><a href="#">Branding</a>
                            </li>
                            <li><a href="#">Watches</a>
                            </li>
                            <li><a href="#">Hats & Caps</a>
                            </li>
                            <li><a href="#">Shoes</a>
                            </li>
                            <li><a href="#">Men's Cloth</a>
                            </li>
                            <li><a href="#">Belts</a>
                            </li>
                            <li><a href="#">Kids Collection</a>
                            </li>
                        </ul>
                    </div>
                    <!--product category-->

                    <!--price filter-->
                    <div class="widget">
                        <div class="heading-title-alt text-left heading-border-bottom">
                            <h6 class="text-uppercase">price filter</h6>
                        </div>
                        <form method="post" action="#">

                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    <input type="text" name="price-from" id="price-from" class=" form-control"
                                        placeholder="From, $" maxlength="100">
                                </div>

                                <div class="col-xs-12 form-group">
                                    <input type="text" name="price-to" id="price-to" class=" form-control"
                                        placeholder="To, $" maxlength="100">
                                </div>
                                <div class=" col-xs-12 form-group">
                                    <button class="btn btn-small btn-dark-border  btn-transparent">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--price filter-->


                    <!--top rated product-->
                    <div class="widget">
                        <div class="heading-title-alt text-left heading-border-bottom">
                            <h6 class="text-uppercase">Top Rated Products</h6>
                        </div>
                        <ul class="widget-latest-post">
                            <li>
                                <div class="thumb">
                                    <a href="#">
                                        <img src="assets/img/product/4.jpg" alt="">
                                    </a>
                                </div>
                                <div class="w-desk">
                                    <a href="#">Praesent pellentesque</a>
                                    <div class="price">$25.99</div>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <div class="product-cart">
                                        <a href="#"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="thumb">
                                    <a href="#">
                                        <img src="assets/img/product/5.jpg" alt="">
                                    </a>
                                </div>
                                <div class="w-desk">
                                    <a href="#">Shirt With Mesh Sleeves</a>
                                    <div class="price">$35.99</div>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <div class="product-cart">
                                        <a href="#"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!--top rated product-->


                    <!--product tags-->
                    <div class="widget">
                        <div class="heading-title-alt text-left heading-border-bottom">
                            <h6 class="text-uppercase">PRODUCT TAGS</h6>
                        </div>
                        <div class="widget-tags">
                            <a href="">Accessories</a>
                            <a href="">Branding</a>
                            <a href="">Belts</a>
                            <a href="">Cloth</a>
                            <a href="">Kids</a>
                            <a href="">Watch</a>
                            <a href="">Shoes</a>
                        </div>
                    </div>
                    <!--product tags-->

                </div>

            </div>
        </div>
    </div>


</section>
@endsection