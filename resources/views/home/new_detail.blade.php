@extends('layouts.master')
@section('title', 'Danh sách sản phẩm')

@section('content')

    <!-- Blog Details Hero Begin -->
    <section style="font-family: 'Times New Roman'" class="blog-details-hero set-bg" data-setbg="{{ asset('public/html/img/blog/details/details-hero.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog__details__hero__text">
                        <h2>Kiến Thức Mỗi Ngày</h2>
                        <ul>
                            <li>Ogani</li>
                            <li>31/10/2020</li>
                            <li>100 lượt xem</li>
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
                                <a href="#" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="{{ asset('public/html/img/blog/sidebar/sr-1.jpg') }}" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>09 Kinds Of Vegetables<br /> Protect The Liver</h6>
                                        <span>25/10/2020</span>
                                    </div>
                                </a>
                                <a href="#" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="{{ asset('public/html/img/blog/sidebar/sr-2.jpg') }}" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>Tips You To Balance<br /> Nutrition Meal Day</h6>
                                        <span>25/10/2020</span>
                                    </div>
                                </a>
                                <a href="#" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="{{ asset('public/html/img/blog/sidebar/sr-3.jpg') }}" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>4 Principles Help You Lose <br />Weight With Vegetables</h6>
                                        <span>25/10/2020</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 order-md-1 order-1">
                    <div class="blog__details__text">
                        <img src="{{ asset('public/html/img/blog/details/details-pic.jpg') }}" alt="">
                        <p style="font-family: 'Times New Roman';">Chứa đựng nhiều thành phần dinh dưỡng, mặt nạ trứng góp phần trong việc chăm sóc và cải
                            thiện làn da. Cùng tìm hiểu các mẹo dưỡng da từ mặt nạ trứng gà nhé.</p>
                        <h4 style="font-family: 'Times New Roman';">Làm đẹp bằng nguyên liệu tự nhiên ngày càng được chị em nhắc đến nhiều hơn bởi cách làm đẹp
                            này sử dụng các thành phần từ tự nhiên an toàn và lành tính với làn da. Trong số đó không
                            thể bỏ qua cách làm đẹp da với mặt nạ trứng gà.</h4>
                        <p style="font-family: 'Times New Roman';">Được biết đến là thực phẩm giàu dinh dưỡng, trứng gà còn "góp mặt" trong quá trình chăm sóc
                            da tự nhiên. Chứa rất nhiều các loại vitamin, chất khoáng, protein và chất béo, trứng gà góp
                            phần giúp làn da sản sinh thêm nhiều collagen, làm chậm quá trình lão hóa, giúp da khỏe đẹp
                            từ sâu bên trong. Tuy nhiên, trứng gà tác động đến làn da và cách làm mặt nạ trứng gà như
                            thế nào để hiệu quả, chúng ta cùng tìm hiểu kĩ hơn nhé.</p>
                    </div>
                    <div class="blog__details__content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="blog__details__author">
                                    <div class="blog__details__author__pic">
                                        <img src="{{ asset('public/html/img/blog/details/details-author.jpg') }}" alt="">
                                    </div>
                                    <div class="blog__details__author__text">
                                        <h6>Michael Scofield</h6>
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
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{ asset('public/html/img/blog/blog-1.jpg') }}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> 30/10/2020</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="{{ url('/new-detail') }}">Mẹo nấu ăn giúp nấu ăn đơn giản</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{ asset('public/html/img/blog/blog-2.jpg') }}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="{{ url('/new-detail') }}">Mẹo nấu ăn giúp nấu ăn đơn giản</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{ asset('public/html/img/blog/blog-3.jpg') }}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="{{ url('/new-detail') }}">Mẹo nấu ăn giúp nấu ăn đơn giản</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related Blog Section End -->
@endsection
