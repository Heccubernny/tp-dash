<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        {{-- <title>{{ $title ?? '' }}</title> --}}
        <title>{{ isset($title) ? $title . ' | ' : 'TaskPadi Admin Dashboard' }}</title>
        @vite('resources/css/app.css')
        <link rel="stylesheet" href="{{mix('css/app.css') }}">
        <link rel="stylesheet" href="https://unpkg.com/simplebar@latest/dist/simplebar.min.css" />
        <link rel="stylesheet" href="{{ mix('css/simplebar.css') }}">
        @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.12/push.min.js"></script>
        <script>
            Push.create("Hello world!");
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js">
        </script>


        @endpush

        @stack('scripts')
        {{-- ChartScript --}}
        {{-- @if($chart)
        {!! $chart->script() !!}
        @endif --}}

    </head>



    <body class="bg-gray-200 display-none" data-simplebar>
        @include('components.header')
        {{-- <div class=""> --}}
        {{-- <div class="mx-auto flex">
             --}}
        <div class="flex flex-col md:flex-row">
            <aside class="w-1/6 p-4 md:w-1/6 fixed top-0 z-10 h-screen bg-[#010446] px-4 py-6">
                @include('components.aside')
            </aside>

            {{-- <main class="container right-0 w-3/4 p-4">
                 --}}
            <main class="md:w-5/6 w-5/6 md:ml-auto z-12 right-0 mb-4 mt-20 pb-2 pt-20 px-4">
                @yield('content')
            </main>
        </div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
        {{-- {!! $chart->script() !!} --}}
        {{-- ChartScript --}}
        {{-- // Import Simplebar JS at the bottom of your HTML file, after importing your own scripts --}}
        <script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js"></script>


    </body>
    <html>
