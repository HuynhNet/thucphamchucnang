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
                <div class="card" style="background-color: ghostwhite">
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Fullname</label>
                                        <input type="text" class="form-control" name="" id="" aria-describedby="helpId"
                                               placeholder="">
                                        {{-- <small id="helpId" class="form-text text-muted">Help text</small>--}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Username</label>
                                        <input type="text" class="form-control" name="" id="" aria-describedby="helpId"
                                               placeholder="">
                                        {{--<small id="helpId" class="form-text text-muted">Help text</small>--}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" name="" id=""
                                               aria-describedby="emailHelpId" placeholder="">
                                        {{--<small id="emailHelpId" class="form-text text-muted">Help text</small>--}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Phone number</label>
                                        <input type="text" class="form-control" name="" id=""
                                               aria-describedby="helpId" placeholder="">
                                        {{--<small id="helpId" class="form-text text-muted">Help text</small>--}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" class="form-control" name="" id="" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Require Password</label>
                                        <input type="password" class="form-control" name="" id="" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Birthday</label>
                                        <input type="date" class="form-control" name="" id=""
                                               aria-describedby="helpId" placeholder="">
                                        {{--<small id="helpId" class="form-text text-muted">Help text</small>--}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <textarea class="form-control" name="" id="" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                                <div class="col-md-6 text-right">
                                    <a href="" type="submit" class="btn btn-primary">Đăng Ký</a>
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
@endsection
