@extends('layouts.master')
@section('title', 'Danh sách sản phẩm')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('public/html/img/breadcrumb.jpg') }}"">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2 style="font-family: 'Times New Roman'">Danh Sách Sản Phẩm</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ url('/') }}">Trang chủ</a>
                            <span>Danh sách sản phẩm</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4 style="font-family: 'Times New Roman'">Loại Sản Phẩm</h4>
                            <ul>
                                @foreach($loais as $loai)
                                    <li>
                                        <a href="{{ route('categoryByName', [$loai->id, $loai->slug]) }}">{{ $loai->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4 style="font-family: 'Times New Roman'">Sản Phẩm mới</h4>
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
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2 style="font-family: 'Times New Roman'">Khuyến Mãi</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                @foreach($khuyenMais as $khuyenMai)
                                    <div class="col-lg-4">
                                        <div class="product__discount__item">
                                            @php($image = DB::table('images')->where('product_id', $khuyenMai->id)->select('img_name')->get())
                                            <div class="product__discount__item__pic set-bg"
                                                 data-setbg="{{ asset('public/img/'.$image[0]->img_name) }}">
                                                <div class="product__discount__percent">-20%</div>
                                                <ul class="product__item__pic__hover">
                                                    @if(Auth::check())
                                                        @php($likes = DB::table('likes')->where('user_id', Auth::user()->id)->first())
                                                        @if($likes === null)
                                                            <li>
                                                                <a href="{{ route('likeProduct', [$khuyenMai->id, Auth::user()->id]) }}">
                                                                    <i class="fa fa-heart" title="Thích"></i>
                                                                </a>
                                                            </li>
                                                        @else
                                                            @php($likes1 = DB::table('likes')->where('user_id', Auth::user()->id)->get())
                                                            @foreach($likes1 as $like)
                                                                @if($like->product_id == $khuyenMai->id)
                                                                    <li>
                                                                        <a disabled="true" style="background-color: red;">
                                                                            <i class="fa fa-heart" title="Đã thích"></i>
                                                                        </a>
                                                                    </li>
                                                                    @break
                                                                @else
                                                                    <li>
                                                                        <a href="{{ route('likeProduct', [$khuyenMai->id, Auth::user()->id]) }}">
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
                                                            <a href="{{ route('viewProduct', $khuyenMai->id) }}">
                                                                <i class="fa fa-retweet" title="Xem chi tiết"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('addCart', $khuyenMai->id) }}">
                                                                <i class="fa fa-shopping-cart" title="Thêm vào giỏ hàng"></i>
                                                            </a>
                                                        </li>
                                                </ul>
                                            </div>
                                            <div class="product__discount__item__text">
                                                <h5><a href="{{ route('viewProduct', $khuyenMai->id) }}">{{ $khuyenMai->name_product }}</a></h5>
                                                @php($price = DB::table('prices')->where('id', $khuyenMai->price)->get())
                                                @foreach($price as $price)
                                                    <h5>{{ number_format($price->price) }} {{ $khuyenMai->unit }}</h5>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>{{ $sum }}</span> Sản phẩm</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-5">
{{--                                <div class="filter__sort">--}}
{{--                                    <span style="font-family: 'Times New Roman'">Lọc theo</span>--}}
{{--                                    <select>--}}
{{--                                        <option value="0">Giá thấp đến cao</option>--}}
{{--                                        <option value="1">Giá cao đến thấp</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($allProducts as $allProduct)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    @php($image = DB::table('images')->where('product_id', $allProduct->id)->select('img_name')->get())
                                    <div class="product__item__pic set-bg" data-setbg="{{ asset('public/img/'.$image[0]->img_name) }}">
                                        <ul class="product__item__pic__hover">
                                            @if(Auth::check())
                                                @php($likes = DB::table('likes')->where('user_id', Auth::user()->id)->first())
                                                @if($likes === null)
                                                    <li>
                                                        <a href="{{ route('likeProduct', [$allProduct->id, Auth::user()->id]) }}">
                                                            <i class="fa fa-heart" title="Thích"></i>
                                                        </a>
                                                    </li>
                                                @else
                                                    @php($likes1 = DB::table('likes')->where('user_id', Auth::user()->id)->get())
                                                    @foreach($likes1 as $like)
                                                        @if($like->product_id == $allProduct->id)
                                                            <li>
                                                                <a disabled="true" style="background-color: red;">
                                                                    <i class="fa fa-heart" title="Đã thích"></i>
                                                                </a>
                                                            </li>
                                                            @break
                                                        @else
                                                            <li>
                                                                <a href="{{ route('likeProduct', [$allProduct->id, Auth::user()->id]) }}">
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
                                                <a href="{{ route('viewProduct', $allProduct->id) }}">
                                                    <i class="fa fa-retweet" title="Xem chi tiết"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('addCart', $allProduct->id) }}">
                                                    <i class="fa fa-shopping-cart" title="Thêm vào giỏ hàng"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="{{ route('viewProduct', $allProduct->id) }}">{{ $allProduct->name_product }}</a></h6>
                                        @php($price = DB::table('prices')->where('id', $allProduct->price)->get())
                                        @foreach($price as $price)
                                            <h5>{{ number_format($price->price) }} {{ $allProduct->unit }}</h5>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="navbar-right">
                            {!!  $allProducts->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

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

        function checkLogin(e){
            alert('Vui lòng đăng nhập để thích sản phẩm');
            e.preventDefault();
        }
    </script>
@endsection
