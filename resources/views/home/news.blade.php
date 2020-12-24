@extends('layouts.master')
@section('title', 'Tin tức')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('public/html/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2 style="font-family: 'Times New Roman'">Tin Tức</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ url('/') }}">Trang chủ</a>
                            <span>Tin tức</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
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
                <div class="col-lg-8 col-md-7">
                    <div class="row">
                        <style>
                            .blog__item h5,p{
                                font-family: "Times New Roman";
                            }
                        </style>
                        @foreach($news as $new)
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="blog__item">
                                    <div class="blog__item__pic">
                                        <img style="width: 300px; height: 200px" src="{{ asset('public/tintuc/'.$new->image) }}" alt="">
                                    </div>
                                    <div class="blog__item__text">
                                        <ul>
                                            <li><i class="fa fa-calendar-o"></i> {{ \Carbon\Carbon::create($new->created_at)->format('M d Y') }}</li>
                                            <li><i class="fa fa-comment-o"></i> 5</li>
                                        </ul>
                                        <h5><a href="{{ route('newDetail', $new->id) }}">{{ $new->title }}</a></h5>
                                        <p>{!! Str::limit($new->content,100,'...') !!}</p>
                                        <a href="{{ route('newDetail', $new->id) }}" class="blog__btn">Xem chi tiết
                                            <span class="arrow_right"></span></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection
