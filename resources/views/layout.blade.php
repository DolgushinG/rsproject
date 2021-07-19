<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta property="og:title" content="Routesetters.ru - search">
    <meta property="og:site_name" content="Поиск подготовщиков по всей России">
    <meta property="og:url"
          content="{{route('home')}}">
    <meta property="og:description"
          content="Здесь можно найти подготовщиков трасс на скалодром как для обычной накрутки, так и для соревнований">
    <meta property="og:image" content="{{asset('storage/images/logo/logors.png')}}">
    <title>Routesetters - search</title>
    <meta content="Routesetters - поиск подготовщиков трасс для скалодромов, по всей России" name="description">

    <meta content="подготовщик трасс, рутсеттер, трассы, боулдеринг, скалолазание" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('favicon.svg')}}" rel="icon">
    <link href="{{asset('storage/images/logo/logors.png')}}" rel="apple-touch-icon">
    <!-- Icons font CSS-->
    <link href="{{asset('vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <!-- Font special for pages-->

    <!-- Vendor CSS-->
    <link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('vendor/datepicker/daterangepicker.css')}}" rel="stylesheet" media="all">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{ asset('vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.1.3/js.cookie.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
{{--    <!-- Yandex.Metrika counter -->--}}
{{--    <script type="text/javascript" >--}}
{{--        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};--}}
{{--            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})--}}
{{--        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");--}}

{{--        ym(78826194, "init", {--}}
{{--            clickmap:true,--}}
{{--            trackLinks:true,--}}
{{--            accurateTrackBounce:true,--}}
{{--            webvisor:true--}}
{{--        });--}}
{{--    </script>--}}
{{--    <noscript><div><img src="https://mc.yandex.ru/watch/78826194" style="position:absolute; left:-9999px;" alt="" /></div></noscript>--}}
{{--    <!-- /Yandex.Metrika counter -->--}}
</head>
<body>
@include('layouts.nav')
@include('cookiemsg')
@yield('content')
@include('layouts.footer')
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
<!-- Vendor JS Files -->
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('vendor/aos/aos.js') }}"></script>
<script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('vendor/purecounter/purecounter.js') }}"></script>
<script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>

<script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
