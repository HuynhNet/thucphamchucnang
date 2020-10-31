@extends('layouts.master')
@section('title', 'Xem sản phẩm')

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('public/html/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Xem Chi Tiết Sản Phẩm</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ url('/') }}">Trang chủ</a>
                            <a href="">Thực phẩm chức năng</a>
                            <span>Viên uống hỗ trợ giảm cân Venus Slim</span>
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
                            <img class="product__details__pic__item--large"
                                 src="{{ asset('public/img/gc1.jpg') }}" alt="">
                        </div>
                        {{--<div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="{{ asset('public/html/img/product/details/product-details-2.jpg') }}"
                                 src="{{ asset('public/html/img/product/details/thumb-1.jpg') }}" alt="">
                            <img data-imgbigurl="{{ asset('public/html/img/product/details/product-details-3.jpg') }}"
                                 src="{{ asset('public/html/img/product/details/thumb-2.jpg') }}" alt="">
                            <img data-imgbigurl="{{ asset('public/html/img/product/details/product-details-5.jpg') }}"
                                 src="{{ asset('public/html/img/product/details/thumb-3.jpg') }}" alt="">
                            <img data-imgbigurl="{{ asset('public/html/img/product/details/product-details-4.jpg') }}"
                                 src="{{ asset('public/html/img/product/details/thumb-4.jpg') }}" alt="">
                        </div>--}}
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>Viên uống hỗ trợ giảm cân Venus Slim</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 lượt xem)</span>
                        </div>
                        <div class="product__details__price">1.400.000 đ</div>
                        <p>TPCN Viên uống giảm cân Oz Slim hỗ trợ tăng cảm giác no,
                            đồng thời làm tiêu hao năng lượng và nhuận tràng. Sản phẩm giúp giảm cân, tăng cường chuyển hóa mỡ. </p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div>
                        </div>
                        <a href="#" class="primary-btn">Thêm vào giỏ hàng</a>
                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <ul>
                            <li><b>Tình trạng</b> <span>Còn hàng</span></li>
                            <li><b>Giao hàng</b> <span>Trong một ngày <samp>Miễn phí ship trong hôm nay</samp></span></li>
                            <li><b>Cân nặng</b> <span>0.5 kg</span></li>
                            {{--<li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </li>--}}
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
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Chi tiết sản phẩm</h6>

                                    <span>1.Thành phần cấu tạo của Viên giảm cân One Slim USA:</span>

                                    <p>Chiết xuất từ quả Kiwi (Kiwi fruit), Chiết xuất từ quả táo (Apple), chiết xuất từ
                                    quả cam (Orangre), Chiết xuất từ quả Guarana (Guarana fruit), Chiết xuất từ Lá sen (Lotus leaf)</p>

                                    <span>2.  Công dụng Viên giảm cân One Slim USA:</span>

                                    <p>Kiềm chế sự thèm ăn, tăng cường tiêu hao năng lượng và giúp cơ thể đốt cháy chất béo,
                                    hỗ trợ giảm cân.</p>

                                    <span>3. Hướng dẫn sử dụng Viên giảm cân One Slim USA:</span>

                                    <p>Ngày dùng 2 lần, mỗi lần 1 viên. Uống vào buổi sáng và buổi trưa lúc bụng đói để có hiệu quả
                                        tốt nhất. Uống nhiều nước, không được bỏ bữa ăn (đặc biệt là ăn sáng hoặc trưa).
                                        Duy trì một chế độ ăn lành mạnh và cân bằng, không uống đồ uống có cồn. Thường xuyên tập thể dục.</p>

                                    <span>Chú ý:</span>

                                    <p>- Không dùng cho phụ nữ có thai hoặc đang nuôi con bằng sữa mẹ.</p>

                                    <p>- Không dùng cho người bị bệnh cao huyết áp, tim mạch, đột quỵ, thận, tăng nhãn áp
                                    và rối loạn chức năng gan.</p>

                                    <p>- Không dùng sản phẩm này nếu bạn đang dùng bất kỳ loại thuốc nào khác.</p>

                                    <p>- Không sử dụng sản phẩm đã hết hạn.</p>

                                    <p>- Đọc kỹ hướng dẫn sử dụng trước khi dùng.</p>

                                    <span>4. Đối tượng sử dụng:</span>

                                    <p>Dành cho nam và nữ có nhu cầu giảm cân, tốt nhất 18 - 60 tuổi.</p>

                                    <span>5. Khối lượng tịnh: 650mg/viên, 60 viên/hộp.</span>

                                    <span>6. Số XNCB: 9244/2014/ATTP- XNCB</span>

                                    <span>7. Sản xuất tại: GEVIE & LEFINE INC.</span>

                                    <span>Địa chỉ: 6888 Linciln Ave, Buena Pack, CA 90620 - USA.</span>
                                    <p>Sản phẩm này là thực phẩm chức năng, không phải thuốc, không có tác dụng thay thế thuốc
                                    chữa bệnh. Đọc kỹ hướng dẫn trước khi sử dụng.</p>

                                    <span>Thông tin trên được trích dẫn từ nhãn trên hộp sản phẩm.</span>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6>Bình luận</h6>
                                            <form action="" method="POST">
                                                <div class="form-group">
                                                    <label for=""></label>
                                                    <textarea class="form-control" name="" id="" rows="3"></textarea>
                                                </div>
                                                <div class="form-group text-right">
                                                    <a type="submit" name="" id="" class="btn btn-primary" href="#" role="button">
                                                        Bình Luận
                                                    </a>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="col-md-6">
                                            <h6>Bình luận trước đó</h6>
                                            <strong style="margin-right: 20px;">HuongThuy</strong>
                                            <i style="color: #2ba832;" class="fa fa-check-circle" aria-hidden="true"></i>
                                            <span style="color: #2ba832;">Đã mua sản phẩm tại OGANI</span>
                                            <div class="product__details__text">
                                                <div class="product__details__rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                    <span style="color: black;">Mình đã mua và sản phẩm dùng rất tốt</span>
                                                </div>
                                            </div>
                                            <hr>
                                            <strong style="margin-right: 20px;">HuongThuy</strong>
                                            <i style="color: #2ba832;" class="fa fa-check-circle" aria-hidden="true"></i>
                                            <span style="color: #2ba832;">Đã mua sản phẩm tại OGANI</span>
                                            <div class="product__details__text">
                                                <div class="product__details__rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                    <span style="color: black;">Mình đã mua và sản phẩm dùng rất tốt</span>
                                                </div>
                                            </div>
                                            <hr>
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
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ asset('public/img/gc3.jpg') }}">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ asset('public/img/gc4.jpg') }}">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ asset('public/img/ld1.jpg') }}">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ asset('public/img/ld2.jpg') }}">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->
@endsection
