<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="{{ asset('theme/client/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('theme/client/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    @include('client.layouts.header')
    <!-- Navbar End -->

    <!-- Featured News Slider Start -->
    @yield('content')
    @yield('scripts')
    <!-- Featured News Slider End -->
    <!-- Footer Start -->
    @include('client.layouts.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-dark back-to-top"><i class="fa fa-angle-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('theme/client/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('theme/client/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('theme/client/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('theme/client/mail/contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('theme/client/js/main.js') }}"></script>
</body>

</html>