@if (Session::has('errors'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    Swal.fire('There is no product match.');
</script>
@endif
<header class="l-header">

    <div class="l-navbar l-navbar_t-light l-navbar_expand js-navbar-sticky">
        <div class="container-fluid">
            <nav class="menuzord js-primary-navigation" role="navigation" aria-label="Primary Navigation">

                <!--logo start-->
                <a href="/" class="logo-brand">
                    <img class="retina" src="/assets/img/logo.png" alt="Massive">
                </a>
                <!--logo end-->

                <!--mega menu start-->
                <ul class="menuzord-menu menuzord-right c-nav_s-standard">
                    <li @if (request()->is('/') || request()->is('/products')) class="active @endif ">
                        <a @if (!(request()->is('/') || request()->is('/products'))) href="/" @endif>shop</a>
                    </li>

                    <li class="nav-divider" aria-hidden="true"><a href="javascript:void(0)">|</a>
                    </li>

                    <li class="cart-info @if (request()->is('carts')) active @endif ">
                        <a @if (!(request()->is('carts'))) href="/carts" @endif><i class="fa fa-shopping-cart">
                            </i> cart({{count($items)}})</a>
                        @if (!request()->is('carts'))
                        <div class="megamenu megamenu-quarter-width ">
                            <div class="megamenu-row">
                                <div class="col12">

                                    @if ($items)
                                    <!--cart-->
                                    @foreach ($items as $item)
                                    <table class="table cart-table-list table-responsive">
                                        <tr>
                                            <td>
                                                <a href="/products/{{$item['item']->id}}">
                                                    <img src="{{$item['item']->thumbnail}}" alt="" />
                                                </a>
                                            </td>
                                            <td><a href="/products/{{$item['item']->id}}">{{$item['item']->name}}</a>
                                            </td>
                                            <td>X{{$item['quantity']}}</td>
                                            <td>{{$item['price']}}
                                                @if ($item['item']->discount)
                                                <del>{{$item['item']->price*$item['quantity']}}</del> </del>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="/carts/remove/{{$item['item']->id}}" class="close">
                                                    <img src="/assets/img/product/close.png" alt="" />
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                    @endforeach

                                    <div class="total-cart pull-right">
                                        <ul>
                                            <li><span>Total Quantity</span> <span>{{$totalQuantity}} </span>
                                            </li>
                                            <li><span>Total </span> <span>$ {{$totalPrice}} </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="s-cart-btn pull-right">
                                        <a href="/carts" class="btn btn-small btn-theme-color"> View
                                            cart</a>
                                        <a href="#" class="btn btn-small btn-dark-solid"> Checkout</a>
                                    </div>
                                    <!--cart-->
                                    @else
                                    <div class="s-cart-btn">
                                        <div>No item!!</div>
                                    </div>
                                    @endif


                                </div>
                            </div>
                        </div>
                        @endif
                    </li>

                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-search"></i> Search</a>
                        <div class="megamenu megamenu-quarter-width navbar-search">
                            <form role="searchform" action='/products/search' method="get">
                                <input type="text" name="product" class="form-control" placeholder="Search Here">
                            </form>
                        </div>
                    </li>
                    @auth
                    <li>
                        <a class="nav-link">{{Auth::user()->name}}</a>
                        <ul class="dropdown">
                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                                this.closest('form').submit();">Log
                                        Out</a>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @else
                    <li>
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>
                    </li>

                    @if (Route::has('register'))
                    <li>
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                    </li>
                    @endif
                    @endauth
                </ul>
                <!--mega menu end-->

            </nav>
        </div>
    </div>

</header>