<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @yield('header-styles')
</head>
<body>
@include('partials.menu')
    <div class="container">
            <div class="content-container">
            @yield('content')
        </div>
    </div>
    @yield('footer-script')
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>