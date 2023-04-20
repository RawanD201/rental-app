<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <meta name="language" content="kurdish">
    <link rel="shortcut icon" href="{{ asset('favico.ico') }}" type="image/x-icon" />
    <link rel="icon" href="{{ asset('favico.ico') }}" type="image/x-icon" />
    <meta name="author" content="apsoft">
    @yield('head-top')
    <link rel="preload" href="https://cdn.staticaly.com/gh/hung1001/font-awesome-pro/4cac1a6/css/all.css"
        as="style" />
    <link href="https://cdn.staticaly.com/gh/hung1001/font-awesome-pro/4cac1a6/css/all.css" rel="stylesheet"
        type="text/css" />

    @vite(['resources/css/app.css'])


    @if (App::isLocale('ku'))
        @vite(['resources/js/app.js'])
    @endif
    @if (!App::isLocale('en'))
        @vite(['resources/css/rtl_app.css', 'resources/js/rtl_app.js'])
    @endif

    @yield('head-bottom')
    <title>@yield('title')</title>
</head>

<body>

    @yield('nav')
    @yield('body')


    @yield('script')
</body>

</html>
