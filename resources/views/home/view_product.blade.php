@extends('layouts.master')
@section('title', 'Xem sản phẩm')

@section('content')
    <!-- Breadcrumb Section Begin -->
    @foreach($product as $product)
        <section class="breadcrumb-section set-bg" data-setbg="{{ asset('public/html/img/breadcrumb.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2>Xem Chi Tiết Sản Phẩm</h2>
                            <div class="breadcrumb__option">
                                <a href="{{ url('/') }}">Trang chủ</a>
                                <a href="">Thực phẩm chức năng</a>
                                <span>{{ $product->name_product }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Section End -->

        <!-- Product Details Section Begin -->
        <section class="product-details spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="product__details__pic">
                            <div class="product__details__pic__item">
                                <style>
                                    figure.zoom {
                                        background-position: 50% 50%;
                                        position: relative;
                                        width: 500px;
                                        overflow: hidden;
                                        cursor: zoom-in;
                                    }

                                    figure.zoom img:hover {
                                        opacity: 0;
                                    }

                                    figure.zoom img {
                                        transition: opacity 0.5s;
                                        display: block;
                                        width: 100%;
                                    }
                                </style>
                                @foreach($image as $image)
{{--                                    <div id="img-zoom-container">--}}
{{--                                        <img class="product__details__pic__item--large"--}}
{{--                                        src="" alt="">--}}
{{--                                    </div>--}}

                                    <figure class="zoom" style="background:url({{ asset('public/img/'.$image->img_name) }})"
                                            onmousemove="zoom(event)" ontouchmove="zoom(event)">
                                        <img src="{{ asset('public/img/'.$image->img_name) }}" />
                                    </figure>

                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="product__details__text">
                            <h3 style="font-family: 'Times New Roman'">{{ $product->name_product }}</h3>
                            <div class="product__details__rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                                <span>(18 lượt xem)</span>
                            </div>
                            @php($price = DB::table('prices')->where('id', $product->price)->get())
                            @foreach($price as $price)
                                <div class="product__details__price">{{ number_format($price->price) }} {{ $product->unit }}</div>
                            @endforeach

                            <input type="hidden" id="productID" name="productID" value="{{ $product->id }}">

                            <p>{{ $product->description }}</p>
                            {{--<div class="product__details__quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="quantity" id="solg">--}}
                            <a href="{{ route('addCart', $product->id) }}" class="primary-btn">Thêm vào giỏ hàng</a>
                            <ul>
                                <li><b>Tình trạng</b> <span>Còn hàng</span></li>
                                <li><b>Giao hàng</b> <span>Trong một ngày <samp>Miễn phí ship trong hôm nay</samp></span></li>
                                <li><b>Trọng lượng</b> <span>{{ $product->weight }}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                       aria-selected="true">Chi tiết sản phẩm</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                       aria-selected="false">Bình Luận</a>
                                </li>
                            </ul>
                            <style>
                                .tab-content p{
                                    font-family: "Times New Roman";
                                }
                            </style>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                        <div class="product__details__tab__desc">
                                            <h6>Chi tiết sản phẩm</h6>
                                            @foreach($detail as $detail)
                                                @if($detail->ingredient != null)
                                                    <span>1.Thành phần:</span>

                                                    <p>{!! $detail->ingredient !!}</p>
                                                @endif

                                                @if($detail->uses != null)
                                                    <span>2.  Công dụng:</span>

                                                    <p>{{ $detail->uses }}</p>
                                                @endif

                                                @if($detail->manual)
                                                    <span>3. Hướng dẫn sử dụng:</span>

                                                    <p>{{ $detail->manual }}</p>
                                                @endif

                                                @if($detail->note)
                                                    <span>4. Chú ý:</span>

                                                    <p>{{ $detail->note }}</p>
                                                @endif

                                                @if($detail->object)
                                                    <span>5. Đối tượng</span>
                                                    <p>{{ $detail->object }}</p>
                                                @endif

                                                @if($detail->preservation)
                                                    <span>6. Bảo quản:</span>
                                                    <p>{{ $detail->preservation }}</p>
                                                @endif

                                                @if($product->weight)
                                                    <span>7. Khối lượng tịnh: {{ $product->weight }}</span>
                                                @endif

                                                <p>Thông tin trên được trích dẫn từ nhãn trên hộp sản phẩm.</p>
                                            @endforeach
                                        </div>
                                </div>
                                <div class="tab-pane" id="tabs-2" role="tabpanel">
                                    <div class="product__details__tab__desc">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6>Bình luận</h6>
                                                @if(Auth::check())
                                                <form action="{{ route('comment', [$product->id, Auth::user()->id]) }}"
                                                      method="POST">
                                                    @csrf

                                                    <div class="form-group">
                                                        <label for=""></label>
                                                        <textarea class="form-control" name="comment" rows="3"></textarea>
                                                    </div>
                                                    <div class="form-group text-right">
                                                        <button type="submit" class="btn btn-primary" role="button">
                                                            Bình Luận
                                                        </button>
                                                    </div>
                                                </form>
                                                @else
                                                    <form action=""
                                                          method="POST">
                                                        <div class="form-group">
                                                            <label for=""></label>
                                                            <textarea class="form-control" name="comment" rows="3"></textarea>
                                                        </div>
                                                        <div class="form-group text-right">
                                                            <button onclick="return checkLogin()" class="btn btn-primary" role="button">
                                                                Bình Luận
                                                            </button>
                                                        </div>
                                                    </form>
                                                @endif
                                            </div>

                                            <div class="col-md-6">
                                                <h6>Bình luận trước đó</h6>
                                                @if(!empty($comments))
                                                    @foreach($comments as $comment)
                                                        @php($userComment = DB::table('users')->where('id', $comment->user_id)
                                                                                    ->select('name')->get())
                                                        <strong style="margin-right: 20px;">{{ $userComment[0]->name }}</strong>
                                                        <i style="color: #2ba832;" class="fa fa-check-circle" aria-hidden="true"></i>
                                                        <span style="color: #2ba832;">Đã mua sản phẩm tại OGANI</span>
                                                        <div class="product__details__text">
                                                            <div class="product__details__rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-half-o"></i>
                                                                <span style="color: black;">{{ $comment->description }}</span>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
        <section class="related-product">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title related__product__title">
                            <h2>Sản Phẩm Liên Quan</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @php($same_product = DB::table('products')->where('category_id', $product->category_id)->take(4)->get())
                    @foreach($same_product as $same_product)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="product__item">
                                @php($image = DB::table('images')->where('product_id', $same_product->id)->get())
                                @foreach($image as $image)
                                    <div class="product__item__pic set-bg" data-setbg="{{ asset('public/img/'.$image->img_name) }}">
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart" title="thích"></i></a></li>
                                            <li>
                                                <a href="{{ route('viewProduct', $same_product->id) }}">
                                                    <i class="fa fa-retweet" title="xem chi tiết"></i>
                                                </a>
                                            </li>
                                            <li><a href="{{ route('addCart', $same_product->id) }}">
                                                    <i class="fa fa-shopping-cart" title="thêm vào giỏ hàng"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                @endforeach

                                <div class="product__item__text">
                                    <h6><a href="{{ route('viewProduct', $same_product->id) }}">{{ $same_product->name_product }}</a></h6>
                                    @php($price = DB::table('prices')->where('id', $same_product->price)->get())
                                    @foreach($price as $price)
                                        <h5>{{ number_format($price->price) }} {{ $same_product->unit }}</h5>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endforeach

    <script>
        function zoom(e) {
            var zoomer = e.currentTarget;
            e.offsetX ? offsetX = e.offsetX : offsetX = e.touches[0].pageX
            e.offsetY ? offsetY = e.offsetY : offsetX = e.touches[0].pageX
            x = (offsetX / zoomer.offsetWidth) * 100
            y = (offsetY / zoomer.offsetHeight) * 100
            zoomer.style.backgroundPosition = x + "% " + y + "%";
        }
    </script>

    <script>
        function addCartWithQuantity() {

            var id = document.getElementById('productID').value;
            var quantity = document.getElementById('solg').value;

            $.ajax({
                url: '{{ route('addCartWithQuantity') }}',
                method: "get",
                data: {_token: '{{ csrf_token() }}',
                    id: id,
                    quantity: quantity
                },
                success: function (response) {
                    swal({
                        title: "Đã thêm vào giỏ hàng",
                        text: "",
                        type: "success",
                        timer: 900,
                        showConfirmButton: false,
                        position: 'top-end',
                    });
                    window.setTimeout(function(){
                        location.reload();
                    } ,900);
                }
            });
        };

        var msg = '{{Session::get('add_cart_success')}}';
        var exist = '{{Session::has('add_cart_success')}}';
        if(exist){
            swal({
                title: "Đã thêm vào giỏ hàng",
                text: "",
                type: "success",
                timer: 900,
                showConfirmButton: false,
                position: 'top-end',
            });
        }

        function checkLogin(e){
            alert('Vui lòng đăng nhập để bình luận');
            e.preventDefault();
        }

    </script>

    <script>
        var msg = '{{Session::get('commentProduct')}}';
        var exist = '{{Session::has('commentProduct')}}';
        if(exist){
            swal({
                title: "Đã bình luận sản phẩm",
                text: "",
                type: "success",
                timer: 900,
                showConfirmButton: false,
                position: 'top-end',
            });
        }
    </script>

@endsection
