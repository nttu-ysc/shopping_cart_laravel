<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Shop</a>
        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a href="/products/admin" class="nav-link">Product</a>
                </li>
                <li class="nav-item">
                    <a href="/categories" class="nav-link">Category</a>
                </li>
                <li class="nav-item">
                    <a href="/tags" class="nav-link">Tag</a>
                </li>
                @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link">{{Auth::user()->name}}</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">Log Out</a>
                    </form>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>