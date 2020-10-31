<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('public/login/assets/css/login.css') }}">
</head>
<body>
<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
        <div class="card login-card">
            <div class="row no-gutters">
                <div class="col-md-5">
                    <img src="{{ asset('public/img/ld3.jpg') }}" alt="login" class="login-card-img">
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <div class="brand-wrapper">
                            <a href="{{ url('/') }}"><img src="{{ asset('public/html/img/logo.png') }}" alt=""></a>
                        </div>
                        <p class="login-card-description">Đăng nhập</p>

                        <form id="loginForm" action="{{ url('/post-login') }}" method="POST"
                              class="needs-validation" @submit="checkSubmit" novalidate="true">
                        @csrf
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" v-model.trim="email" class="form-control"
                                       placeholder="Email address" @blur="validateInput">
                                <small v-if="emailValidate === 'invalid'" class="form-text text-muted">
                                    <span style="color: red;">Vui lòng nhập email!</span></small>
                                <small v-if="isEmail === false" class="form-text text-muted">
                                    <span style="color: red;">Vui lòng nhập vào là một email!</span></small>
                            </div>
                            <div class="form-group mb-4">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="password" v-model.trim="password"
                                       class="form-control" placeholder="***********" @blur="validateInput">
                                <small v-if="passwordValidate === 'invalid'" class="form-text text-muted">
                                    <span style="color: red;">Vui lòng nhập mật khẩu!</span></small>
                            </div>
                            <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Login">
                        </form>
                        <a href="" class="forgot-password-link">Forgot password?</a>
                        <p class="login-card-footer-text">Don't have an account? <a href="{{ url('/register') }}" class="text-reset">Register here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="{{ asset('public/js/app.js') }}" defer></script>
</body>
</html>
