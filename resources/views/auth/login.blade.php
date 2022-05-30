<!DOCTYPE html>
<html lang="en">

<!-- auth-login.html  Tue, 07 Jan 2020 03:39:47 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; CodiePie</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('Asset/auth/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Asset/auth/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('Asset/auth/assets/modules/bootstrap-social/bootstrap-social.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('Asset/auth/assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Asset/auth/assets/css/components.min.css') }}">
</head>

<body class="layout-4">

    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="{{asset('Asset/logo.png')}}" alt="logo" width="100" class="shadow-light rounded-circle">
                            <h4>Student</h4>
                        </div>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}" class="needs-validation"
                                    novalidate="">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" @error('email') is-invalid @enderror
                                            value="{{ old('email') }}" class="form-control" name="email"
                                            tabindex="1" required autofocus>
                                        @error('email')
                                        <div style="display: block" class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                            <div class="float-right">
                                                <a href="auth-forgot-password.html" class="text-small">
                                                    Forgot Password?
                                                </a>
                                            </div>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password"
                                            tabindex="2" required>
                                        @error('password')
                                        <div style="display: block" class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input"
                                                tabindex="3" id="remember-me">
                                            <label class="custom-control-label" for="remember-me">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>

                        <div class="simple-footer">
                            Copyright &copy; CodiePie 2020
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('Asset/auth/assets/bundles/lib.vendor.bundle.js') }}"></script>
    <script src="{{ asset('Asset/auth/assets/js/CodiePie.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ asset('Asset/auth/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('Asset/auth/assets/js/custom.js') }}"></script>
</body>

<!-- auth-login.html  Tue, 07 Jan 2020 03:39:47 GMT -->

</html>
