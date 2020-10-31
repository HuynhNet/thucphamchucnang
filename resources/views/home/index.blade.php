@extends('layouts.master')
@section('title', 'Trang chủ')

@section('hero_banner')
    @include('layouts.hero_banner')
@endsection

@section('content')
    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset('public/img/bd2.jpg') }}">
                            <h5><a href="{{ url('/view-product') }}" class="btn btn-info">Xem chi tiết</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset('public/img/bd3.jpg') }}">
                            <h5><a href="{{ url('/view-product') }}" class="btn btn-info">Xem chi tiết</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset('public/img/bd4.jpg') }}">
                            <h5><a href="{{ url('/view-product') }}" class="btn btn-info">Xem chi tiết</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset('public/img/gc1.jpg') }}">
                            <h5><a href="{{ url('/view-product') }}" class="btn btn-info">Xem chi tiết</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset('public/img/gc3.jpg') }}">
                            <h5><a href="{{ url('/view-product') }}" class="btn btn-info">Xem chi tiết</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2 style="font-family: 'Times New Roman'">Sản Phẩm Nỗi Bật</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{ asset('public/img/gc3.jpg') }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart" title="Thích"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet" title="Xem chi tiết"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart" title="Mua"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Venus Slim</a></h6>
                            <h5>150.000 VNĐ</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fastfood">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{ asset('public/img/gc4.jpg') }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart" title="Thích"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet" title="Xem chi tiết"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart" title="Mua"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Venus Slim</a></h6>
                            <h5>150.000 VNĐ</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{ asset('public/img/ld1.jpg') }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart" title="Thích"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet" title="Xem chi tiết"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart" title="Mua"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Venus Slim</a></h6>
                            <h5>150.000 VNĐ</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood oranges">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{ asset('public/img/ld2.jpg') }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart" title="Thích"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet" title="Xem chi tiết"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart" title="Mua"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Venus Slim</a></h6>
                            <h5>150.000 VNĐ</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat vegetables">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{ asset('public/img/ld3.jpg') }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart" title="Thích"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet" title="Xem chi tiết"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart" title="Mua"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Venus Slim</a></h6>
                            <h5>150.000 VNĐ</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fastfood">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{ asset('public/img/ld4.jpg') }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart" title="Thích"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet" title="Xem chi tiết"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart" title="Mua"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Venus Slim</a></h6>
                            <h5>150.000 VNĐ</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat vegetables">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{ asset('public/img/toc1.jpg') }}">
                            <ul class="featured__item__pic__hover">

                                <li><a href="#"><i class="fa fa-heart" title="Thích"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet" title="Xem chi tiết"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart" title="Mua"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Venus Slim</a></h6>
                            <h5>150.000 VNĐ</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood vegetables">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{ asset('public/img/toc2.jpg') }}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart" title="Thích"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet" title="Xem chi tiết"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart" title="Mua"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">Venus Slim</a></h6>
                            <h5>150.000 VNĐ</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ asset('public/html/img/banner/banner-1.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ asset('public/html/img/banner/banner-2.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Sản phẩm mới</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width: 110px;" src="{{ asset('public/img/toc3.jpg') }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Golden Nest</h6>
                                        <span>300.000 VNĐ</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width: 110px;" src="{{ asset('public/img/toc4.jpg') }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Golden Nest</h6>
                                        <span>300.000 VNĐ</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width: 110px;" src="{{ asset('public/img/bd1.jpg') }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Golden Nest</h6>
                                        <span>300.000 VNĐ</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width: 110px;" src="{{ asset('public/img/bd2.jpg') }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Golden Nest</h6>
                                        <span>300.000 VNĐ</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width: 110px;" src="{{ asset('public/img/bd3.jpg') }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Golden Nest</h6>
                                        <span>300.000 VNĐ</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width: 110px;" src="{{ asset('public/img/bd4.jpg') }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Golden Nest</h6>
                                        <span>300.000 VNĐ</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Thịnh Hành</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width: 110px;" src="{{ asset('public/img/toc3.jpg') }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Golden Nest</h6>
                                        <span>300.000 VNĐ</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width: 110px;" src="{{ asset('public/img/toc4.jpg') }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Golden Nest</h6>
                                        <span>300.000 VNĐ</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width: 110px;" src="{{ asset('public/img/bd1.jpg') }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Golden Nest</h6>
                                        <span>300.000 VNĐ</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width: 110px;" src="{{ asset('public/img/bd2.jpg') }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Golden Nest</h6>
                                        <span>300.000 VNĐ</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width: 110px;" src="{{ asset('public/img/bd3.jpg') }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Golden Nest</h6>
                                        <span>300.000 VNĐ</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width: 110px;" src="{{ asset('public/img/bd4.jpg') }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Golden Nest</h6>
                                        <span>300.000 VNĐ</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Thích nhiều</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width: 110px;" src="{{ asset('public/img/toc3.jpg') }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Golden Nest</h6>
                                        <span>300.000 VNĐ</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width: 110px;" src="{{ asset('public/img/toc4.jpg') }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Golden Nest</h6>
                                        <span>300.000 VNĐ</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width: 110px;" src="{{ asset('public/img/bd1.jpg') }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Golden Nest</h6>
                                        <span>300.000 VNĐ</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width: 110px;" src="{{ asset('public/img/bd2.jpg') }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Golden Nest</h6>
                                        <span>300.000 VNĐ</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width: 110px;" src="{{ asset('public/img/bd3.jpg') }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Golden Nest</h6>
                                        <span>300.000 VNĐ</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width: 110px;" src="{{ asset('public/img/bd4.jpg') }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Golden Nest</h6>
                                        <span>300.000 VNĐ</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->
@endsection


