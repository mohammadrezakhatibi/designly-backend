<!DOCTYPE html>
<html>
<head>
    <title>Designly | @yield('title')</title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="robots" content="INDEX,FOLLOW,all" />
    <meta name="googlebot" content="INDEX, FOLLOW" />

    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, minimal-ui" />
    <meta name="viewport" content="width=device-width, minimal-ui">

    <link rel="stylesheet" media="screen" href=" {{ asset('theme/library/css/semantic/semantic.css') }} ">
    <link rel="stylesheet" media="screen" href=" {{ asset('theme/library/css/style.css') }} ">

    <script src=" {{ asset('theme/library/js/jquery-3.3.1.min.js') }} "></script>
    <script src=" {{ asset('theme/library/css/semantic/dist/semantic.js') }} "></script>

    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">

    <script>
        $(document).ready(function(){
            var mainHeight = $('.main').innerHeight();
            $('.sidebar').css('min-height',mainHeight);
        });
    </script>
    @yield('script')
</head>
<body>