
<!-- Header Section Begin -->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="{{ url('/') }}"><img src="{{ asset('public/html/img/logo.png') }}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="{{ url('/') }}">Trang chủ</a></li>
                        {{--<li><a href="#">Danh mục</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="">Giảm cân</a></li>
                                <li><a href="">Bồi dưỡng</a></li>
                                <li><a href="">Chăm sóc tóc</a></li>
                                <li><a href="">Chăm sóc da</a></li>
                            </ul>
                        </li>--}}
                        <li><a href="{{ url('/list-product') }}">Danh sách</a></li>
                        <li><a href="">Tin tức</a></li>
                        <li><a href="{{ url('/contact') }}">Giới thiệu</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="{{ url('/shopping-cart') }}"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->

