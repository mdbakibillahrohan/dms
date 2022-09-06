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
            @yield('login_content')
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
