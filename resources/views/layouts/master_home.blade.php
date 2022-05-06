<!DOCTYPE html>
<html dir="rtl">

@php
    $seo = App\Models\SEO::first();
    $contact = App\Models\Contact::first();

@endphp

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>
        @yield('title')
    </title>
    <meta content="{{$seo->meta_description}}" name="descriptison">
    <meta content="{{$seo->meta_keyword}}" name="keywords">
    <meta content="{{$seo->meta_author}}" name="author">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@500;600&display=swap" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{ asset('fontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fontend/assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fontend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fontend/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fontend/assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
    <link href="{{ asset('fontend/assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fontend/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('fontend/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- Template Main CSS File -->
    <link href="{{ asset('fontend/assets/css/style.css') }}" rel="stylesheet">
    <script>
        {{ $seo->google_analytics }}
    </script>

    <style>
        .phone{
            position:fixed;
            bottom:20px;
            left:20px;
            z-index:1000;
        }


        @keyframes FadeIn {
            0% {
            transform:rotate(0deg);
            }
            100% {
            transform:rotate(360deg);
            }
        }


        .hide{
            position:absolute;
            bottom:0px !important;
            z-index:-1;
            transition:all 2s;

        }

        .social{

        }

        .phone a{
            height:30px;
            width:120px;
            background:#000;
            padding:20px;
            display:flex;
            flex-direction:row;
            border-radius:10px;
            justify-content:center;
            align-items:center;
            text-decoration:none;
            color:#fff;
            margin:2px;
        }
    </style>
    <!-- =======================================================
    * Template Name: Company - v2.1.0
    * Template URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

@include('layouts.body.header')

  <main id="main">

    @yield('home_content')

    <div class="phone">
        <a class="bg-success w-20" href="tel:{{ $contact->phone }}"> <i class="fa fa-phone"> اتصل الان</i></a>
    </div>
  </main>

  @include('layouts.body.footer')

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('fontend/assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('fontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('fontend/assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('fontend/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('fontend/assets/vendor/jquery-sticky/jquery.sticky.js') }}"></script>
  <script src="{{ asset('fontend/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('fontend/assets/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('fontend/assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('fontend/assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('fontend/assets/vendor/aos/aos.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('fontend/assets/js/main.js') }}"></script>


</body>

</html>
