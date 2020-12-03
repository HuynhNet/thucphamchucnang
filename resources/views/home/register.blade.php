@extends('layouts.master')
@section('title', 'Register')
@section('content')
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h3 style="text-align: center; font-family: 'Times New Roman'; font-weight: bold; color: green;">
                    Đăng Ký Tài Khoản OGANI</h3>
                <br>

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

                <div class="card" style="background-color: ghostwhite">
                    <div class="card-body">
                        <form action="{{ url(('/check-register')) }}" method="post">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Fullname</label>
                                        <input type="text" class="form-control" name="fullname" id="fullname" aria-describedby="helpId"
                                               placeholder="Họ và tên">
                                         <small style="color: red" class="form-text text-muted">{{ $errors->first('fullname') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Username</label>
                                        <input type="text" class="form-control" name="username" id="username" aria-describedby="helpId"
                                               placeholder="Tên tài khoản">
                                        <small style="color: red" class="form-text text-muted">{{ $errors->first('username') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                               aria-describedby="emailHelpId" placeholder="Nhập email" onblur="return isEmail()">
                                        <small style="color: red" class="form-text text-muted">{{ $errors->first('email') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Phone number</label>
                                        <input type="text" class="form-control" name="phone" id="phone"
                                               aria-describedby="helpId" placeholder="Số điện thoại" onblur="return Test_numberphone()">
                                        <small style="color: red" class="form-text text-muted">{{ $errors->first('phone') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Nhập mật khẩu">
                                        <small style="color: red" class="form-text text-muted">{{ $errors->first('password') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Require Password</label>
                                        <input type="password" class="form-control" name="re_password" id="re_password" placeholder="Xác nhận mật khẩu">
                                        <small style="color: red" class="form-text text-muted">{{ $errors->first('re_password') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Birthday</label>
                                        <input type="date" class="form-control" name="birthday" id="birthday"
                                               aria-describedby="helpId" placeholder="NHập ngày sinh">
                                        <small style="color: red" class="form-text text-muted">{{ $errors->first('birthday') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <textarea class="form-control" name="address" id="address" rows="3"></textarea>
                                        <small style="color: red" class="form-text text-muted">{{ $errors->first('address') }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                                <div class="col-md-6 text-right">
                                    <button type="submit" class="btn btn-primary">Đăng Ký</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <br><br>

    <script>

        function Test_numberphone(){
            var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            var mobile = $('#phone').val();
            if(mobile !==''){
                if (vnf_regex.test(mobile) == false)
                {
                    alert('Số điện thoại không đúng định dạng. Vui lòng nhập lại');
                }
            }
        }

        function isEmail() {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var email = $('#email').val();
            if(email !==''){
                if(regex.test(email) == false){
                    alert('Email không đúng định dạng. Vui lòng nhập lại');
                }
            }
        }

    </script>

@endsection
