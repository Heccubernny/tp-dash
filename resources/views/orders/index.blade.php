{{--@extends('components.layout')--}}
{{--@section('content')--}}
{{--<h1>Sales Graphs</h1>--}}

{{--<div class="justify-center items-center flex w-3/4">--}}
{{--    --}}{{-- {!! dd($chart->container()) !!} --}}
{{--    {!! $chart->container(--}}
{{--    ) !!}--}}


{{--    --}}{{-- https://screenrec.com/share/1LbxCUaEqn  ddscreenshot --}}
{{--</div>--}}
{{--@if($chart)--}}
{{--{!! $chart->script() !!}--}}
{{--@endif--}}
{{--@endsection--}}


<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([


                ['Year', 'Completed', 'Pending', "Declined"],
                ['2013',  1000, 400, 234],
                ['2014',  1170, 460, 324],
                ['2015',  660,  1120, 342],
                ['2016',  1030, 540, 432]
            ]);

            var options = {
                title: 'All Orders',
                legend: {position: 'bottom', maxLines: 3,},
                hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
                vAxis: {title: 'Tasks', titleTextStyle: {italic: false, bold: true}, minValue: 0}
            };

            var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
</head>
<body>
<div id="chart_div" style="width: 100%; height: 500px;"></div>
</body>
</html>
