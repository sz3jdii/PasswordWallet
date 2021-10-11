<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Password Wallet</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="canonical" href="{{ url('/') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link href="{{ asset('css/site.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/header_site.js') }}"></script>
</head>
<body class=" @yield('body-class')">
<div class="overlay">
    <div class="overlayDoor"></div>
    <div class="overlayContent">
        <div class="loader">
            <img src="{{ asset('images/spinner.svg') }}" alt="spinner" class="spinner">
        </div>
    </div>
</div>

@include('layouts.site.parts.header')
<!-- Site wrapper -->
<div class="wrapper min-height">
    @yield('content')
</div>
@include('layouts.site.parts.footer')
<!-- ./wrapper -->

<!-- Scripts -->
<script src="{{ asset('js/site.js') }}"></script>


@stack('footer-scripts')

{!! Toastr::message() !!}
</body>
</html>
