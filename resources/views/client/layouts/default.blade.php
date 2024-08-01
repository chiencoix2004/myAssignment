<!DOCTYPE html>


<html lang="en-us">

<head>
    <meta charset="utf-8">
    <title>Cửa Hàng Tiện Lợi</title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="This is meta description">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Hugo 0.74.3" />

    <!-- theme meta -->
    <meta name="theme-name" content="reader" />

    <!-- plugins -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/slick/slick.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" media="screen">

    <!--Favicon-->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

    <meta property="og:title" content="Cửa Hàng Tiện Lợi" />
    <meta property="og:description" content="This is meta description" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:updated_time" content="2020-03-15T15:40:24+06:00" />
    @stack('css')

    <style>
        .user-info {
            text-align: center; /* Căn giữa nội dung trong khối */
            display: flex;
            flex-direction: column; /* Hiển thị các phần tử theo chiều dọc */
            align-items: center; /* Căn giữa các phần tử theo chiều ngang */
        }
        .user-info i {
            font-size: 24px; /* Kích thước biểu tượng */
            color: black; /* Màu sắc của biểu tượng */
        }
        .user-info p {
            margin-top: 5px; /* Khoảng cách giữa biểu tượng và chữ */
            font-size: 14px; /* Kích thước chữ */
        }
        .search-bar {
            flex-grow: 1; /* Cho phép thanh tìm kiếm mở rộng để lấp đầy không gian */
            display: flex;
            align-items: center; /* Căn giữa nội dung theo chiều dọc */
        }
        .search-bar input {
            width: 100%; /* Chiều rộng của thanh tìm kiếm */
            padding: 0.5rem; /* Padding để thêm không gian xung quanh */
        }
        .navbar-toggler {
            border: 0; /* Loại bỏ đường viền */
            background: transparent; /* Nền trong suốt */
        }
        .order-2 {
            order: 2; /* Đặt thứ tự của phần tử */
        }
        .order-lg-3 {
            order: 3; /* Đặt thứ tự của phần tử khi trên màn hình lớn */
        }
        .order-1 {
            order: 1; /* Đặt thứ tự của phần tử */
        }
    </style>
</head>

<body>
    <!-- header -->
    @include('client.layouts.header')
    <!-- /header -->

    {{-- content  --}}
    @yield('content')
    {{-- /content  --}}

    {{-- footer  --}}
    @include('client.layouts.footer')
    {{-- /footer  --}}

    <!-- JS Plugins -->
    <script src="{{ asset('plugins/jQuery/jquery.min.js') }}"></script>

    <script src="{{ asset('plugins/bootstrap/bootstrap.min.js') }}"></script>

    <script src="{{ asset('plugins/slick/slick.min.js') }}"></script>

    <script src="{{ asset('plugins/instafeed/instafeed.min.js') }}"></script>


    <!-- Main Script -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
