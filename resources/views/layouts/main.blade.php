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
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ url('js/modules/bootstrap-social/bootstrap-social.css')}}">
    <link rel="stylesheet" href="{{ url('js/modules/datatables/datatables.min.css')}}">
    {{-- <link rel="stylesheet" href="{{ url('js/modules/select2/dist/css/select2.min.css')}}"> --}}
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
    integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />


    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('css/style.min.css')}}">
    <link rel="stylesheet" href="{{ url('css/components.min.css')}}">

    <script src="https://unpkg.com/slim-select@latest/dist/slimselect.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/slim-select@latest/dist/slimselect.css" />


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
<script src="{{ url('js/modules/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{ url('js/modules/datatables/datatables.min.js')}}"></script>
{{-- <script src="{{ url('js/modules/select2/dist/js/select2.full.min.js')}}"></script> --}}

<script
    src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
    integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  ></script>





<!-- Page Specific JS File -->
{{-- <script src="{{ url('js/page/index.js')}}"></script> --}}

<!-- Template JS File -->
<script src="{{ url('js/scripts.js')}}"></script>
<script src="{{ url('js/custom.js')}}"></script>
<script defer src="{{ url('js/alpine.js')}}"></script>

@livewireScripts
@stack('scripts')

</body>

</html>
