@extends('layouts.master')
@section('title', 'Trang tìm kiếm')

@section('hero_banner')
    @include('layouts.hero_banner')
@endsection

@section('content')
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2 style="font-family: 'Times New Roman'">Tìm Thấy {{ $sum }} Sản Phẩm</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach($prominence_product as $prominence_product)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                        <div class="featured__item">
                            @php($image = DB::table('images')->where('product_id', $prominence_product->id)->get())
                            @foreach($image as $image)
                                <div class="featured__item__pic set-bg" data-setbg="{{ asset('public/img/'.$image->img_name) }}">
                                    <ul class="featured__item__pic__hover">
                                        @if(Auth::check())
                                            @php($likes = DB::table('likes')->where('user_id', Auth::user()->id)->first())
                                            @if($likes === null)
                                                <li>
                                                    <a href="{{ route('likeProduct', [$prominence_product->id, Auth::user()->id]) }}">
                                                        <i class="fa fa-heart" title="Thích"></i>
                                                    </a>
                                                </li>
                                            @else
                                                @php($likes1 = DB::table('likes')->where('user_id', Auth::user()->id)->get())
                                                @foreach($likes1 as $like)
                                                    @if($like->product_id == $prominence_product->id)
                                                        <li>
                                                            <a disabled="true" style="background-color: red;">
                                                                <i class="fa fa-heart" title="Đã thích"></i>
                                                            </a>
                                                        </li>
                                                        @break
                                                    @else
                                                        <li>
                                                            <a href="{{ route('likeProduct', [$prominence_product->id, Auth::user()->id]) }}">
                                                                <i class="fa fa-heart" title="Thích"></i>
                                                            </a>
                                                        </li>
                                                        @break
                                                    @endif

                                                @endforeach
                                            @endif
                                        @else
                                            <li>
                                                <a onclick="return checkLogin()">
                                                    <i class="fa fa-heart" title="Thích"></i>
                                                </a>
                                            </li>
                                        @endif
                                        <li>
                                            <a href="{{ route('viewProduct', $prominence_product->id) }}">
                                                <i class="fa fa-retweet" title="Xem chi tiết"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('addCart', $prominence_product->id) }}">
                                                <i class="fa fa-shopping-cart" title="Thêm vào giỏ hàng"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                            <div class="featured__item__text">
                                <h6><a href="{{ route('viewProduct', $prominence_product->id) }}">{{ $prominence_product->name_product }}</a></h6>
                                @php($price = DB::table('prices')->where('id', $prominence_product->price)->get())
                                @foreach($price as $price)
                                    <h5>{{ number_format($price->price) }} {{ $prominence_product->unit }}</h5>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

