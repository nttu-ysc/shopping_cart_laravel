<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
</head>

<body>

    <!--  preloader start -->
    @include('layouts.preloader')
    <!-- preloader end -->


    <div class="wrapper">

        <!--header start-->
        @include('layouts.header')
        <!--header end-->


        <!--page title start-->
        @yield('page-title')
        <!--page title end-->

        <!--body content start-->
        @yield('content')
        <!--body content end-->

        <!--footer start 1-->
        @include('layouts.footer')
        <!--footer 1 end-->

    </div>


    @include('layouts.js')
    @yield('script')
</body>

</html>