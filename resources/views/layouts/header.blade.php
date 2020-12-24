
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
                        <li><a href="{{ url('/') }}">Trang chủ</a></li>
                        <li><a href="{{ url('/list-product') }}">Danh sách</a></li>
                        <li><a href="{{ url('news') }}">Tin tức</a></li>
                        <li><a href="{{ url('/contact') }}">Giới thiệu</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li>
                            <a href="{{ url('/shopping-cart') }}">
                                <i class="fa fa-shopping-bag"></i>

                                @if(Session::has('cart'))
                                    <span>{{ $totalQty }}</span>
                                @else
                                    <span>0</span>
                                @endif

                            </a>
                        </li>
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

