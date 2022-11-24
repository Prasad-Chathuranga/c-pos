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
    <link rel="stylesheet" href="{{ asset('js/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('js/modules/bootstrap-social/bootstrap-social.css')}}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('css/style.min.css')}}">
    <link rel="stylesheet" href="{{ url('css/components.min.css')}}">

    @livewireStyles
</head>

<body class="layout-4">
    
    <div id="app">

       
        @livewire('login')
   
        

    </div>


    @livewireScripts


    <!-- General JS Scripts -->
<script src="{{ asset('js/bundles/lib.vendor.bundle.js')}}"></script>
<script src="{{ asset('js/CodiePie.js')}}"></script>

<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="{{ asset('js/scripts.js')}}"></script>
<script src="{{ asset('js/custom.js')}}"></script>

</body>

</html>
