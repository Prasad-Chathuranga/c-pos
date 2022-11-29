<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '') }} </title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ url('js/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('js/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ url('js/modules/bootstrap-social/bootstrap-social.css')}}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('css/style.min.css')}}">
    <link rel="stylesheet" href="{{ url('css/components.min.css')}}">

    @livewireStyles
</head>

<body class="layout-4">
    {{-- <div class="page-loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
    </div> --}}
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            @include('layouts.rightbar')   
        <div class="main-content">
        @include('layouts.leftbar') 
        @yield('content')
            

         {{-- @yield('component') --}}
         {{-- @livewire('users.create') --}}
   
        </div>

    </div>
    </div>


  


    <!-- General JS Scripts -->
<script src="{{ url('js/bundles/lib.vendor.bundle.js')}}"></script>
<script src="{{ url('js/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ url('js/CodiePie.js')}}"></script>

<!-- JS Libraies -->
<script src="{{ url('js/modules/jquery.sparkline.min.js')}}"></script>
<script src="{{ url('js/modules/chart.min.js')}}"></script>
<script src="{{ url('js/modules/owlcarousel2/dist/owl.carousel.min.js')}}"></script>
<script src="{{ url('js/modules/summernote/summernote-bs4.js')}}"></script>
<script src="{{ url('js/modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>

<!-- Page Specific JS File -->
{{-- <script src="{{ url('js/page/index.js')}}"></script> --}}

<!-- Template JS File -->
<script src="{{ url('js/scripts.js')}}"></script>
<script src="{{ url('js/custom.js')}}"></script>

@livewireScripts

</body>

</html>
