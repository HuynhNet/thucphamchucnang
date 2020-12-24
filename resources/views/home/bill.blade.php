<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hóa Đơn Điện Tử</title>
    <meta charset="utf-8">
    <link rel="icon" href="{{ url('public/home/image_icon/logo-icon.png') }}" type="image/icon type">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<br><br>
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="img">
                <a href="{{ url('/') }}"><img style="height: 50px;" src="{{ asset('public/html/img/logo.png') }}" alt=""></a>
                @foreach($order as $order)
                    <span class="float-right">
                        <strong>Mã hóa đơn: </strong>{{ $order->id }}
                        <br>
                        <strong>Ngày tạo:</strong> {{ $order->date_create }}
                    </span>
                @endforeach
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h6 class="mb-3">Từ:</h6>
                    <div>
                        <strong>ThucPhamChucNang</strong>
                    </div>
                    <div>Địa chỉ: An Cư, Ninh Kiều, Cần Thơ</div>
                    <div>Email: ogani@gmail.com </div>
                    <div>Phone: 0657 385 234 </div>
                </div>

                <div class="col-sm-6">
                    <h6 class="mb-3">Đến:</h6>
                    @foreach($customer as $customer)
                        <div>
                            <strong>
                                    <div>{{ $customer->name }}</div>
                            </strong>
                        </div>
                        <div>Email: {{ $customer->email }} </div>
                        <div>Số điện thoại: {{ $customer->phone }} </div>
                        <div>Địa chỉ: {{ $customer->address }}</div>
                    @endforeach
                </div>



            </div>

            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Đơn vị tính</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Tổng tiền</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($orderDetail as $get_order_detail)

                        @php($get_products = DB::table('products')
                        ->where('id',$get_order_detail->product_id)->get())
                        @foreach($get_products as $key => $get_product)

                            <tr>
                                <td data-label="STT">
                                    {{ ++$key }}
                                </td>

                                <td data-label="Tên sản phẩm">
                                    <b>{{ $get_product->name_product }}</b>
                                </td>

                                <td data-label="Giá">
                                    @php($price = DB::table('prices')->where('id', $get_product->price)->select('price')->get())
                                    {{ number_format($price[0]->price) }} VND
                                </td>

                                <td data-label="Đơn vị tính">
                                    {{ $get_product->unit }}
                                </td>

                                <td data-label="Số lượng">
                                    {{ $get_order_detail->quantity }}
                                </td>

                                <td data-label="Tổng tiền">
                                    {{ number_format($get_order_detail->amount) }} VND
                                </td>

                            </tr>

                        @endforeach
                    @endforeach
                    </tbody>

                </table>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-5">

                </div>

                <div class="col-lg-4 col-sm-5 ml-auto">
                    <table class="table table-clear">
                        <tbody>
                        <tr>
                            <td class="left">
                                <strong>Thành tiền</strong>
                            </td>
                            <td class="right">
                                <strong>{{ number_format($total) }} VND</strong>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <style>
                        @media print {
                            .print{  display:none; }
                        }
                    </style>
                    <a style="float: right" class="btn btn-success print" onClick="window.print()">In</a>

                </div>

            </div>

        </div>
    </div>
</div>

<script>
    var msg2 = '{{Session::get('checkout_success')}}';
    var exist2 = '{{Session::has('checkout_success')}}';
    if(exist2){
        swal({
            title: "Bạn đã thanh toán thành công",
            text: "",
            type: "success",
            timer: 1200,
            showConfirmButton: false,
            position: 'top-end',
        });
    }

    var msg3 = '{{Session::get('checkout_fail')}}';
    var exist3 = '{{Session::has('checkout_fail')}}';
    if(exist3){
        swal({
            title: "Lỗi trong quá trình thanh toán dịch vụ",
            text: "",
            type: "success",
            timer: 1200,
            showConfirmButton: false,
            position: 'top-end',
        });
    }
</script>

</body>
</html>
