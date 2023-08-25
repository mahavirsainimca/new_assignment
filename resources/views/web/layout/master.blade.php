<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="">

        <title> {{ env('APP_NAME') }}</title>
        <link href="{{ URL::asset('front/css/styles.css') }}" rel="stylesheet" />
    </head>
    <body id="page-top">

        @include('web.layout.header')
            @yield('content')
        @include('web.layout.footer')

    </body>
</html>
