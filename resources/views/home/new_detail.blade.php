@extends('layouts.master')
@section('title', 'Danh sách sản phẩm')

@section('content')

    <!-- Blog Details Hero Begin -->
    <section style="font-family: 'Times New Roman'" class="blog-details-hero set-bg" data-setbg="{{ asset('public/html/img/blog/details/details-hero.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog__details__hero__text">
                        <h2 style="font-family: 'Times New Roman'">Kiến Thức Mỗi Ngày</h2>
                        <ul>
                            <li>Ogani</li>
                            <li>{{ \Carbon\Carbon::now()->format('M d Y') }}</li>
                            <li>{{ random_int(10, 100) }} lượt xem</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad" style="font-family: 'Times New Roman'">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 order-md-1 order-2">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4 style="font-family: 'Times New Roman'">Loại Tin Tức</h4>
                            <ul>
                                <li><a href="#">Tất cả</a></li>
                                <li><a href="#">Giảm cân</a></li>
                                <li><a href="#">Bồi dưỡng tóc</a></li>
                                <li><a href="#">Chăm sóc da</a></li>
                                <li><a href="#">Giảm cân</a></li>
                                <li><a href="#">Bồi dưỡng tóc</a></li>
                            </ul>
                        </div>
                        <style>
                            .blog__sidebar__item h6{
                                font-family: "Times New Roman";
                            }
                        </style>
                        <div class="blog__sidebar__item">
                            <h4 style="font-family: 'Times New Roman'">Tin Tức Gần Đây</h4>
                            <div class="blog__sidebar__recent">
                                @foreach($tingans as $tingan)
                                    <a href="{{ route('newDetail', $tingan->id) }}" class="blog__sidebar__recent__item">
                                        <div class="blog__sidebar__recent__item__pic">
                                            <img style="width: 100px; height: 100px;"
                                                 src="{{ asset('public/tintuc/'.$tingan->image) }}" alt="">
                                        </div>
                                        <div class="blog__sidebar__recent__item__text">
                                            <h6>{{ $tingan->title }}</h6>
                                            <span>{{ \Carbon\Carbon::create($tingan->created_at)->format('M d Y')  }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 order-md-1 order-1">
                    @foreach($new as $new)
                        <div class="blog__details__text">
                            <img src="{{ asset('public/tintuc/'.$new->image) }}" alt="">
                            <p style="font-family: 'Times New Roman'; color: black; font-size: 15px">{!! $new->content !!}</p>
                        </div>
                        <div class="blog__details__content">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="blog__details__author">
                                        <div class="blog__details__author__pic">
                                            <img src="{{ asset('public/storage/users/yen.jpg') }}" alt="">
                                        </div>
                                        <div class="blog__details__author__text">
                                            <h6>Kim Yen</h6>
                                            <span>Admin</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="blog__details__widget">
                                        <ul>
                                            <li><span>Loại sản pẩm:</span> Làm đẹp</li>
                                        </ul>
                                        <div class="blog__details__social">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-google-plus"></i></a>
                                            <a href="#"><i class="fa fa-linkedin"></i></a>
                                            <a href="#"><i class="fa fa-envelope"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

    <!-- Related Blog Section Begin -->
    <section class="related-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related-blog-title">
                        <h2 style="font-family: 'Times New Roman'">CÓ THỂ BẠN THÍCH</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <style>
                    .blog__item h5{
                        font-family: "Times New Roman";
                    }
                </style>
                @foreach($thichs as $thich)
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="{{ asset('public/tintuc/'.$thich->image) }}" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> {{ \Carbon\Carbon::create($thich->created_at)->format('M d Y') }}</li>
                                    <li><i class="fa fa-comment-o"></i> 5</li>
                                </ul>
                                <h5><a href="{{ route('newDetail', $thich->id) }}">{{ $thich->title }}</a></h5>
                                <p>{!! Str::limit($thich->content,100,'...') !!}</p>
                                <a href="{{ route('newDetail', $thich->id) }}" class="blog__btn">Xem chi tiết
                                    <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Related Blog Section End -->
@endsection
