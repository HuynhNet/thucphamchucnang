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

                    @foreach($product as $product)
                        @php($image = DB::table('images')->where('product_id', $product->id)->get())
                        @foreach($image as $image)
                            <div class="col-lg-3">
                                <div class="categories__item set-bg" data-setbg="{{ asset('public/img/'.$image->img_name) }}">
                                    <h5><a href="{{ route('viewProduct', $product->id) }}" class="btn btn-info">Xem chi tiết</a></h5>
                                </div>
                            </div>
                            @endforeach
                    @endforeach
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
                        <h2 style="font-family: 'Times New Roman'">Sản Phẩm Khuyến mãi</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach($promotion_products as $promotion_product)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                        <div class="featured__item">
                            @php($image = DB::table('images')->where('product_id', $promotion_product->id)->get())
                            @foreach($image as $image)
                                <div class="featured__item__pic set-bg" data-setbg="{{ asset('public/img/'.$image->img_name) }}">
                                    <ul class="featured__item__pic__hover">
                                        @if(Auth::check())
                                            @php($likes = DB::table('likes')->where('user_id', Auth::user()->id)->first())
                                            @if($likes === null)
                                                <li>
                                                    <a href="{{ route('likeProduct', [$promotion_product->id, Auth::user()->id]) }}">
                                                        <i class="fa fa-heart" title="Thích"></i>
                                                    </a>
                                                </li>
                                            @else
                                                @php($likes1 = DB::table('likes')->where('user_id', Auth::user()->id)->get())
                                                @foreach($likes1 as $like)
                                                    @if($like->product_id == $promotion_product->id)
                                                        <li>
                                                            <a disabled="true" style="background-color: red;">
                                                                <i class="fa fa-heart" title="Đã thích"></i>
                                                            </a>
                                                        </li>
                                                        @break
                                                    @else
                                                        <li>
                                                            <a href="{{ route('likeProduct', [$promotion_product->id, Auth::user()->id]) }}">
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
                                            <a href="{{ route('viewProduct', $promotion_product->id) }}">
                                                <i class="fa fa-retweet" title="Xem chi tiết"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('addCart', $promotion_product->id) }}">
                                                <i class="fa fa-shopping-cart" title="Thêm vào giỏ hàng"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                            <div class="featured__item__text">
                                <h6><a href="{{ route('viewProduct', $promotion_product->id) }}">{{ $promotion_product->name_product }}</a></h6>
                                {{--@php($price = DB::table('prices')->where('id', $promotion_product->price)->get())
                                @foreach($price as $price)

                                @endforeach--}}
                                <h5>{{ number_format($promotion_product->promotion_price) }} {{ $promotion_product->unit }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

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
                                @php($new_product = DB::table('products')->skip(13)->take(3)->get())
                                @foreach($new_product as $new_product)
                                    <a href="{{ route('viewProduct', $new_product->id) }}" class="latest-product__item">
                                        @php($image = DB::table('images')->where('product_id', $new_product->id)->get())
                                        @foreach($image as $image)
                                            <div class="latest-product__item__pic">
                                                <img style="width: 110px;" src="{{ asset('public/img/'.$image->img_name) }}" alt="">
                                            </div>
                                        @endforeach
                                        <div class="latest-product__item__text">
                                            <a href="{{ route('viewProduct', $new_product->id) }}">
                                                <h6>{{ $new_product->name_product }}</h6>
                                            </a>
                                            @php($price = DB::table('prices')->where('id', $new_product->price)->get())
                                            @foreach($price as $price)
                                                <span>{{ number_format($price->price) }} {{ $new_product->unit }}</span>
                                            @endforeach
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @php($new_product_last = DB::table('products')->skip(16)->take(3)->get())
                                @foreach($new_product_last as $new_product_last)
                                    <a href="{{ route('viewProduct', $new_product_last->id) }}" class="latest-product__item">
                                        @php($image = DB::table('images')->where('product_id', $new_product_last->id)->get())
                                        @foreach($image as $image)
                                            <div class="latest-product__item__pic">
                                                <img style="width: 110px;" src="{{ asset('public/img/'.$image->img_name) }}" alt="">
                                            </div>
                                        @endforeach
                                        <div class="latest-product__item__text">
                                            <a href="{{ route('viewProduct', $new_product_last->id) }}">
                                                <h6>{{ $new_product_last->name_product }}</h6>
                                            </a>
                                            @php($price = DB::table('prices')->where('id', $new_product_last->price)->get())
                                            @foreach($price as $price)
                                                <span>{{ number_format($price->price) }} {{ $new_product_last->unit }}</span>
                                            @endforeach
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Thịnh Hành</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @php($top_product = DB::table('products')->skip(19)->take(3)->get())
                                @foreach($top_product as $top_product)
                                    <a href="{{ route('viewProduct', $top_product->id) }}" class="latest-product__item">
                                        @php($image = DB::table('images')->where('product_id', $top_product->id)->get())
                                        @foreach($image as $image)
                                            <div class="latest-product__item__pic">
                                                <img style="width: 110px;" src="{{ asset('public/img/'.$image->img_name) }}" alt="">
                                            </div>
                                        @endforeach
                                        <div class="latest-product__item__text">
                                            <a href="{{ route('viewProduct', $top_product->id) }}">
                                                <h6>{{ $top_product->name_product }}</h6>
                                            </a>
                                            @php($price = DB::table('prices')->where('id', $top_product->price)->get())
                                            @foreach($price as $price)
                                                <span>{{ number_format($price->price) }} {{ $top_product->unit }}</span>
                                            @endforeach
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @php($top_product_last = DB::table('products')->skip(22)->take(3)->get())
                                @foreach($top_product_last as $top_product_last)
                                    <a href="{{ route('viewProduct', $top_product_last->id) }}" class="latest-product__item">
                                        @php($image = DB::table('images')->where('product_id', $top_product_last->id)->get())
                                        @foreach($image as $image)
                                            <div class="latest-product__item__pic">
                                                <img style="width: 110px;" src="{{ asset('public/img/'.$image->img_name) }}" alt="">
                                            </div>
                                        @endforeach
                                        <div class="latest-product__item__text">
                                            <a href="{{ route('viewProduct', $top_product_last->id) }}">
                                                <h6>{{ $top_product_last->name_product }}</h6>
                                            </a>
                                            @php($price = DB::table('prices')->where('id', $top_product_last->price)->get())
                                            @foreach($price as $price)
                                                <span>{{ number_format($price->price) }} {{ $top_product_last->unit }}</span>
                                            @endforeach
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Thích nhiều</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @php($like_product = DB::table('products')->skip(25)->take(3)->get())
                                @foreach($like_product as $like_product)
                                    <a href="{{ route('viewProduct', $like_product->id) }}" class="latest-product__item">
                                        @php($image = DB::table('images')->where('product_id', $like_product->id)->get())
                                        @foreach($image as $image)
                                            <div class="latest-product__item__pic">
                                                <img style="width: 110px;" src="{{ asset('public/img/'.$image->img_name) }}" alt="">
                                            </div>
                                        @endforeach
                                        <div class="latest-product__item__text">
                                            <a href="{{ route('viewProduct', $like_product->id) }}">
                                                <h6>{{ $like_product->name_product }}</h6>
                                            </a>
                                            @php($price = DB::table('prices')->where('id', $like_product->price)->get())
                                            @foreach($price as $price)
                                                <span>{{ number_format($price->price) }} {{ $like_product->unit }}</span>
                                            @endforeach
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @php($like_product_last = DB::table('products')->skip(25)->take(3)->get())
                                @foreach($like_product_last as $like_product_last)
                                    <a href="{{ route('viewProduct', $like_product_last->id) }}" class="latest-product__item">
                                        @php($image = DB::table('images')->where('product_id', $like_product_last->id)->get())
                                        @foreach($image as $image)
                                            <div class="latest-product__item__pic">
                                                <img style="width: 110px;" src="{{ asset('public/img/'.$image->img_name) }}" alt="">
                                            </div>

                                        @endforeach
                                        <div class="latest-product__item__text">
                                            <a href="{{ route('viewProduct', $like_product_last->id) }}">
                                                <h6>{{ $like_product_last->name_product }}</h6>
                                            </a>
                                            @php($price = DB::table('prices')->where('id', $like_product_last->price)->get())
                                            @foreach($price as $price)
                                                <span>{{ number_format($price->price) }} {{ $like_product_last->unit }}</span>
                                            @endforeach
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml            : true,
                version          : 'v9.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Your Chat Plugin code -->
    <div class="fb-customerchat"
         attribution=setup_tool
         page_id="102777274988486"
         logged_in_greeting="Xin chào - Chúng tôi có thể giúp gì cho bạn?"
         logged_out_greeting="Xin chào - Chúng tôi có thể giúp gì cho bạn?">
    </div>

    <script>

        var msg = '{{Session::get('add_cart_success')}}';
        var exist = '{{Session::has('add_cart_success')}}';
        if(exist){
            swal({
                title: "Đã thêm vào giỏ hàng",
                text: "",
                type: "success",
                timer: 1200,
                showConfirmButton: false,
                position: 'top-end',
            });
        }

        var msg1 = '{{Session::get('likeProduct')}}';
        var exist1 = '{{Session::has('likeProduct')}}';
        if(exist1){
            swal({
                title: "Đã thích sản phẩm",
                text: "",
                type: "success",
                timer: 1200,
                showConfirmButton: false,
                position: 'top-end',
            });
        }

        {{--var msg2 = '{{Session::get('checkout_success')}}';--}}
        {{--var exist2 = '{{Session::has('checkout_success')}}';--}}
        {{--if(exist2){--}}
        {{--    swal({--}}
        {{--        title: "Bạn đã thanh toán thành công",--}}
        {{--        text: "",--}}
        {{--        type: "success",--}}
        {{--        timer: 1200,--}}
        {{--        showConfirmButton: false,--}}
        {{--        position: 'top-end',--}}
        {{--    });--}}
        {{--}--}}

        {{--var msg3 = '{{Session::get('checkout_fail')}}';--}}
        {{--var exist3 = '{{Session::has('checkout_fail')}}';--}}
        {{--if(exist3){--}}
        {{--    swal({--}}
        {{--        title: "Lỗi trong quá trình thanh toán dịch vụ",--}}
        {{--        text: "",--}}
        {{--        type: "success",--}}
        {{--        timer: 1200,--}}
        {{--        showConfirmButton: false,--}}
        {{--        position: 'top-end',--}}
        {{--    });--}}
        {{--}--}}

        function checkLogin(e){
            alert('Vui lòng đăng nhập để thích sản phẩm');
            e.preventDefault();
        }

    </script>

@endsection


