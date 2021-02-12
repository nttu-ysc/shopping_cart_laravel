<!--product category-->
<div class="widget">
    <div class="heading-title-alt text-left heading-border-bottom">
        <h6 class="text-uppercase">product category</h6>
    </div>
    <ul class="widget-category">
        @foreach ($categories as $category)
        <li><a href="/products/category/{{ $category->id }}">{{ $category->name }}</a></li>
        </li>
        @endforeach
    </ul>
</div>
<!--product category-->

<!--price filter-->
<div class="widget">
    <div class="heading-title-alt text-left heading-border-bottom">
        <h6 class="text-uppercase">price filter</h6>
    </div>
    <form method="post" action="/products/price">
        @csrf
        <div class="row">
            <div class="col-xs-12 form-group">
                <input type="text" name="priceFrom" id="price-from" class=" form-control" placeholder="From, $"
                    maxlength="100">
            </div>

            <div class="col-xs-12 form-group">
                <input type="text" name="priceTo" id="price-to" class=" form-control" placeholder="To, $"
                    maxlength="100">
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
                    <img src="/assets/img/product/4.jpg" alt="">
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
                    <img src="/assets/img/product/5.jpg" alt="">
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
        @foreach ($tags as $tag)
        <a href="/products/tags/{{ $tag->id }}">{{ $tag->name }}</a>
        @endforeach
    </div>
</div>
<!--product tags-->