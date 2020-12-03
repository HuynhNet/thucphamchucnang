<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Loại sản phẩm </span>
                    </div>
                    <ul>
                        @foreach($typeProduct as $typeProduct)
                            <li><a href="#">{{ $typeProduct->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                Bạn cần gì ?
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <style>
                        .hero__search__phone a:hover{
                            color: #007bff;
                        }
                    </style>
                    @if(Auth::check())
                        <div class="hero__search__phone">
                            <div class="btn-group">
                                <style>
                                    .dropdown:hover>.dropdown-menu {
                                        display: block;
                                    }

                                    .dropdown>.dropdown-toggle:active {
                                        pointer-events: none;
                                    }
                                </style>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Thông tin</a>
                                        <a class="dropdown-item" href="#">Đăng xuất</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <a href="{{ url('/login') }}"><i class="fa fa-user" aria-hidden="true" title="Đăng nhập"></i></a>
                            </div>
                            <div class="hero__search__phone__icon">
                                <a href="{{url('/register')}}"><i class="fa fa-arrow-circle-o-right" aria-hidden="true" title="Đăng ký"></i></a>
                            </div>
                        </div>
                    @endif

                </div>
                <div id="carouselId" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselId" data-slide-to="1"></li>
                        <li data-target="#carouselId" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img src="{{ asset('public/img/banner6.png') }}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('public/img/banner3.png') }}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('public/img/banner7.png') }}" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->
