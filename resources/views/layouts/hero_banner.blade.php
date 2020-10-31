<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Loại Sản Phẩm</span>
                    </div>
                    <ul>
                        <li><a href="#">Giảm cân</a></li>
                        <li><a href="#">Bồi dưỡng tóc</a></li>
                        <li><a href="#">Chăm sóc da</a></li>
                        <li><a href="#">Giảm cân</a></li>
                        <li><a href="#">Bồi dưỡng tóc</a></li>
                        <li><a href="#">Chăm sóc da</a></li>
                        <li><a href="#">Giảm cân</a></li>
                        <li><a href="#">Bồi dưỡng tóc</a></li>
                        <li><a href="#">Chăm sóc da</a></li>
                        <li><a href="#">Giảm cân</a></li>
                        <li><a href="#">Giảm cân</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
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
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <a href="{{ url('/login') }}"><i class="fa fa-user" aria-hidden="true" title="Đăng nhập"></i></a>
                        </div>
                        <div class="hero__search__phone__icon">
                            <a href="{{url('/register')}}"><i class="fa fa-arrow-circle-o-right" aria-hidden="true" title="Đăng ký"></i></a>
                        </div>
                    </div>
                </div>
                <div id="carouselId" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselId" data-slide-to="1"></li>
                        <li data-target="#carouselId" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img src="{{ asset('public/html/img/hero/banner.jpg') }}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('public/html/img/hero/banner.jpg') }}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('public/html/img/hero/banner.jpg') }}" alt="Third slide">
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
