@extends('layouts.master')
@section('title', 'Giỏ hàng')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('public/html/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Thanh Toán</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ url('/') }}">Trang chủ</a>
                            <span>Thanh toán</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Chi Tiết Thanh Toán</h4>
                <form action="{{ route('postCheckoutArea') }}" method="post">
                    @csrf

                    <div class="row">
                        @if(Auth::check())
                            <div class="col-lg-6 col-md-6">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Họ tên<span>*</span></p>
                                            <input type="text" name="username" id="username" value="{{ Auth::user()->name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Phone<span>*</span></p>
                                            <input type="text" name="phone" id="phone" value="{{ Auth::user()->phone }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Email<span>*</span></p>
                                            <input type="text" name="email" id="email" value="{{ Auth::user()->email }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="checkout__input">
                                    <p>Địa chỉ<span>*</span></p>
                                    <textarea class="form-control" name="address" id="address" rows="3">
                                        {{ Auth::user()->address }}
                                    </textarea>
                                </div>
                            </div>
                        @else
                            <div class="col-lg-6 col-md-6">
                                <input type="hidden" name="user_id" value="-1">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Họ tên<span>*</span></p>
                                            <input type="text" name="username" id="username">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Phone<span>*</span></p>
                                            <input type="text" name="phone" id="phone">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Email<span>*</span></p>
                                            <input type="text" name="email" id="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout__input">
                                    <p>Địa chỉ<span>*</span></p>
                                    <textarea class="form-control" name="address" rows="3" id="address"></textarea>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="acc">
                                        Đăng ký
                                        <input type="checkbox" id="acc">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <p>Tạo tài khoản bằng cách nhập thông tin bên dưới. Nếu bạn là khách hàng cũ, vui lòng đăng nhập ở đầu trang</p>
                                <div class="checkout__input">
                                    <p>Mật khẩu<span>*</span></p>
                                    <input type="password">
                                </div>
                            </div>
                        @endif

                        <div class="col-lg-6 col-md-6">
                            <div class="checkout__order">
                                <h4>Đơn Hàng</h4>
                                @if(Session::has('cart'))
                                    <div class="checkout__order__products">Sản phẩm <span>Tổng</span></div>
                                    <ul>
                                        @foreach($product_cart as $product)
                                            <li>
                                                {{ $product['item']['name_product'] }}
                                                <span>{{number_format($product['price'] * $product['qty']) }} {{ $product['item']['unit'] }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="checkout__order__total">Tổng <span>{{ number_format($totalPrice) }} đ</span></div>
                                    <input type="hidden" name="total" value="{{ $totalPrice }}">
                                @else
                                    <p>Không có sản phẩm trong giỏ hàng</p>
                                @endif

                                <button type="submit" class="site-btn" id="checkThanhToan">THANH TOÁN</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

    <script>
        document.getElementById('checkThanhToan').onclick = function(e){
            var name = $('#username').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var address = $('#address').val();

            if((name == '') || (email == '') || (phone == '') || (address == '') ){
                alert('Vui lòng điền thông tin khách hàng!');
                e.preventDefault();
            }
        }
    </script>
@endsection
