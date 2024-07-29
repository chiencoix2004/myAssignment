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
    <script src="{{asset('plugins/jQuery/jquery.min.js')}}"></script>

    <script src="{{asset('plugins/bootstrap/bootstrap.min.js')}}"></script>

    <script src="{{asset('plugins/slick/slick.min.js')}}"></script>

    <script src="{{asset('plugins/instafeed/instafeed.min.js')}}"></script>


    <!-- Main Script -->
    <script src="{{asset('js/script.js')}}"></script>
</body>

</html>
