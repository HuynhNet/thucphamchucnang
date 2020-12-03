@extends('layouts.master')
@section('title', 'Giỏ hàng')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('public/html/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Giỏ Hàng</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ url('/') }}">Trang chủ</a>
                            <span>Giỏ Hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            @if(Session::has('cart'))
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                            <tr>
                                <th class="shoping__product">Sản Phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($product_cart as $product)
                                    <tr>
                                        <td class="shoping__cart__item">
                                            @php($image = DB::table('images')->where('product_id', $product['item']['id'])->get())
                                            @foreach($image as $image)
                                                <img style="height: 100px; width: 100px;"
                                                    src="{{ asset('public/img/'.$image->img_name) }}" alt="">
                                            @endforeach
                                            <h5>{{ $product['item']['name_product'] }}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            {{ number_format($product['price']) }} {{ $product['item']['unit'] }}
                                        </td>
                                        <td>
                                            <style>
                                                .quantity{
                                                    margin-left: 50px;
                                                }
                                            </style>
                                            <div class="quantity text-center">
                                                    <input style="width: 30%;" type="number" id="txt_solg" value="{{$product['qty']}}"
                                                           class="form-control quantity"
                                                           onchange="update_cart({{ $product['item']['id'] }} + ',' + this.value)">
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total">
                                            {{ number_format($product['price'] * $product['qty']) }} {{ $product['item']['unit'] }}
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <a onclick="return xacnhanxoa('Ban co chac chan xoa?')"
                                               href="{{ route('getDeleteCart',$product['item']['id']) }}"
                                               class="btn btn-danger" data-toggle="tooltip" title="xóa">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{ route('home') }}" class="primary-btn cart-btn">Tiếp tục mua hàng</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5 style="font-family: 'Times New Roman';">Mã giảm giá</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">Áp dụng</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5 style="font-family: 'Times New Roman';">Tổng giỏ hàng</h5>
                        <ul>
                            <li>Tổng Tiền <span>{{ number_format($totalPrice) }} đ</span></li>
                        </ul>
                        <a href="{{ url('/checkout') }}" class="primary-btn">THANH TOÁN</a>
                    </div>
                </div>
            </div>
            @else
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 style="font-weight: bold; font-family: 'Times New Roman';" class="card-text text-center">
                                    Không có sản phẩm trong giỏ hàng</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
            @endif
        </div>
    </section>
    <!-- Shoping Cart Section End -->

    <script>
        function update_cart(e) {
            var ele = e.split(",");
            var ktra = document.getElementById('txt_solg').value;
            if(ktra > 0){
                $.ajax({
                    url: '{{ route('getUpdateCart') }}',
                    method: "get",
                    data: {_token: '{{ csrf_token() }}',
                        id: ele[0],
                        quantity: ele[1]},
                    success: function (response) {
                        swal({
                            title: "Đã cập nhật",
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
            }else{
                document.getElementById('txt_solg').value = 1;
            }
        };

        function xacnhanxoa(msg){
            if(window.confirm(msg)){
                return true;
            }
            return false;
        }

        var msg = '{{Session::get('delete_cart')}}';
        var exist = '{{Session::has('delete_cart')}}';
        if(exist){
            // swal({
            //     title: "Đã xóa sản phẩm ra khỏi giỏ hàng",
            //     text: "",
            //     type: "success",
            //     timer: 1200,
            //     showConfirmButton: false,
            //     position: 'top-end',
            // });

            swal({
                title: "Đã xóa sản phẩm ra khỏi giỏ hàng",
                text: "",
                type: "success",
                timer: 900,
                showConfirmButton: false,
                position: 'top-end',
            });
        }

    </script>
@endsection
