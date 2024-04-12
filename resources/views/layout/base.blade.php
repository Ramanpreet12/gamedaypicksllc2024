<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ $dark_mode ? 'dark' : '' }}{{ $color_scheme != 'default' ? ' ' . $color_scheme : '' }}">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="image/svg+xml">
    <link href="{{ asset('dist/images/logo.svg') }}" rel="shortcut icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Gameday Pick LLC">
    <meta name="keywords" content="Gameday Pick LLC">
    <meta name="author" content="">
    <link rel="stylesheet" href="{{asset('dist/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/custom.css')}}">
    {{-- for datetime picker --}}
    <link rel="stylesheet" href="{{asset('dist/css/datetimepicker.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    @yield('head')

    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ mix('dist/css/app.css') }}" />
    <!-- END: CSS Assets-->
    <style>
        label.error {
            color: #dc3545;
            font-size: 14px;
        }

    </style>
</head>
<!-- END: Head -->
@yield('body')
</html>
