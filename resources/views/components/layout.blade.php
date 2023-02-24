<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        {{-- <title>{{ $title ?? '' }}</title> --}}
        <title>{{ isset($title) ? $title . ' | ' : 'TaskPadi Admin Dashboard' }}</title>
        @vite('resources/css/app.css')
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    </head>



    <body>
        @include('components.header')

        {{-- <div class=""> --}}
        <div class="container">
            {{-- @include('components.aside') --}}
            <div class="container">

                @yield('content')
            </div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
            {{-- {!! $chart->script() !!} --}}

    </body>
    <html>
