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