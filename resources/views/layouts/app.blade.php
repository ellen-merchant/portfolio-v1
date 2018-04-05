<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @include('partials._favicon')
    <link href="{{ asset('alloy-editor/assets/alloy-editor-ocean-min.css') }}" rel="stylesheet">
    <script src="{{ asset('alloy-editor/alloy-editor-all-min.js') }}"></script>
</head>
<body>
<div id="app" class="ellen-theme mb-5">
    <div class="container rounded-bottom outer-container">
        <header class="text-center p-3">
            @include('partials._header')
        </header>
        <nav class="navbar navbar-expand-md navbar-light justify-content-md-center border-bottom">
            @include('partials._navigation')
        </nav>
        <main class="p-3">
            <h2 class="pink">{{ $mainTitle ?? '' }}</h2>
            @yield('content')
        </main>
        <footer class="px-3 pb-3 pt-5">
            @include('partials._footer')
        </footer>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
@yield('js')
</body>
</html>