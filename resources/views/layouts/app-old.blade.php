<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="msapplication-tap-highlight" content="no">

    <!-- SEO -->
    <meta name="description" content="{{ config('project.description') }}">

    <!-- Facebook Meta -->
    <meta property="og:title" content="{{ config('app.name') }}">
    <meta property="og:image" content="">
    <meta property="og:type" content="Website">
    <meta property="og:author" content="">

    <!-- Google Meta -->
    <meta itemprop="name" content="">
    <meta itemprop="description" content="{{ config('project.description') }}">
    <meta itemprop="image" content="">
    <meta itemprop="author" content=""/>

    <!-- Twitter Meta-->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="">
    <meta name="twitter:title" content="{{ config('app.name') }}">
    <meta name="twitter:description" content="{{ config('project.description') }}">
    <meta name="twitter:image" content="">
    <meta name="twitter:domain" content="{{ config('project.url') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset( elixir('css/app.css') ) }}">

    <!-- Styles -->
    <!-- Latest compiled and minified CSS -->
</head>

<body id="app-layout">
    <div class="container">
        @if(session()->has('flash_message'))
            {{ session('flash_message') }}
        @endif

        @yield('content')

        <script src=" {{ asset( elixir('js/app.js') ) }}"></script>
    </div>
</body>
</html>
