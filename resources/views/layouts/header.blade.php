<header class="l-header">

    <div class="l-navbar l-navbar_t-light l-navbar_expand js-navbar-sticky">
        <div class="container-fluid">
            <nav class="menuzord js-primary-navigation" role="navigation" aria-label="Primary Navigation">

                <!--logo start-->
                <a href="index.html" class="logo-brand">
                    <img class="retina" src="/assets/img/logo.png" alt="Massive">
                </a>
                <!--logo end-->

                <!--mega menu start-->
                <ul class="menuzord-menu menuzord-right c-nav_s-standard">
                    <li class="active"><a>shop</a>
                    </li>

                    <li class="nav-divider" aria-hidden="true"><a href="javascript:void(0)">|</a>
                    </li>

                    <li class="cart-info">
                        <a href="javascript:void(0)"><i class="fa fa-shopping-cart"></i> cart(2)</a>
                        <div class="megamenu megamenu-quarter-width ">
                            <div class="megamenu-row">
                                <div class="col12">

                                    <!--cart-->
                                    <table class="table cart-table-list table-responsive">
                                        <tr>
                                            <td>
                                                <a href="#">
                                                    <img src="/assets/img/product/1.jpg" alt="" />
                                                </a>
                                            </td>
                                            <td><a href="#"> Women's Top</a>
                                            </td>
                                            <td>X4</td>
                                            <td>$ 122.00</td>
                                            <td>
                                                <a href="#" class="close">
                                                    <img src="/assets/img/product/close.png" alt="" />
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#">
                                                    <img src="/assets/img/product/2.jpg" alt="" />
                                                </a>
                                            </td>
                                            <td><a href="#"> Men's T-shirt</a>
                                            </td>
                                            <td>X4</td>
                                            <td>$ 122.00</td>
                                            <td>
                                                <a href="#" class="close">
                                                    <img src="/assets/img/product/close.png" alt="" />
                                                </a>
                                            </td>
                                        </tr>
                                    </table>

                                    <div class="total-cart pull-right">
                                        <ul>
                                            <li><span>Sub Total</span> <span>$ 2000.00 </span>
                                            </li>
                                            <li><span>Total </span> <span>$ 2000.00 </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="s-cart-btn pull-right">
                                        <a href="shop-cart.html" class="btn btn-small btn-theme-color"> View
                                            cart</a>
                                        <a href="#" class="btn btn-small btn-dark-solid"> Checkout</a>
                                    </div>
                                    <!--cart-->

                                </div>
                            </div>
                        </div>
                    </li>

                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-search"></i> Search</a>
                        <div class="megamenu megamenu-quarter-width navbar-search">
                            <form role="searchform">
                                <input type="text" class="form-control" placeholder="Search Here">
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