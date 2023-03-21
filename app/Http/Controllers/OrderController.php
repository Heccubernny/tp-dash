<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Charts\TaskChart;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->data = [
            '2020-01-01' => 100,
            '2020-02-01' => 200,
            '2020-03-01' => 150,
            '2020-04-01' => 300,
            '2020-05-01' => 250,
        ];
        $this->data2 = [
            ['2013',  1000, 400, 234],
                ['2014',  1170, 460, 324],
                ['2015',  660,  1120, 342],
                ['2016',  1030, 540, 432],
        ];
        $this->chart = new TaskChart;
        $this->options = [
            'xAxis' => [
                'title' => [
                    'text' => 'Month'
                ]
            ],
            'yAxis' => [
                'title' => [
                    'text' => 'Sales'
                ]
            ],

            'legend' => [
                'align' => 'center',
                'verticalAlign' => 'bottom',
                'layout' => 'horizontal'
            ],

        ];
        $this->options2 = ['backgroundColor' => '#B8F7F7', 'fill' => false, 'borderColor' => '#f00', 'tension' => 0, 'borderJoinStyle' => 'bevel', 'position' => 'bottom', 'showLine' => true, 'spanGaps' => true, 'stepped' => true, 'pointRadius' => 10, 'pointHoverRadius' => 15, 'pointHitRadius' => 20, 'pointBorderWidth' => 2, 'pointStyle' => 'rectRounded', 'responsive' => true,
            'maintainAspectRatio' => false, 'yAxes' => [
                [
                    'ticks' => [
                        'beginAtZero' => true,
                        'stepSize' => 50,
                    ],
                ],
            ],];
        $this->options3 = ['backgroundColor' => '#B8F7F7', 'fill' => false, 'borderColor' => '#f00', 'tension' => 0, 'borderJoinStyle' => 'bevel', 'position' => 'bottom', 'showLine' => true, 'spanGaps' => true, 'stepped' => true, 'pointRadius' => 10, 'pointHoverRadius' => 15, 'pointHitRadius' => 20, 'pointBorderWidth' => 2, 'pointStyle' => 'rectRounded', 'responsive' => true,
            'maintainAspectRatio' => false, 'yAxes' => [
                [
                    'ticks' => [
                        'beginAtZero' => true,
                        'stepSize' => 50,
                    ],
                ],
            ],];
    }

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $this->chart->title("All Orders", 20, '#152147', true, "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif");
        $this->chart->labels(array_keys($this->data));
        $this->chart->options($this->options);
        $this->chart->dataset('Complete', 'line', array_values($this->data))->options($this->options2);
        return view('orders.index', ['chart' => $this->chart]);
    }


    // Custom function
    public function countOrdersByStatus(Request $request, Order $order)
    {
        $tasks = DB::table('orders')
            ->select(DB::raw('DATE(created_at) as date'), 'status', DB::raw('COUNT(*) as count'))
            ->groupBy('date', 'status')
            ->get();
        $chart =$this->chart;
        $chart->title('All Orders');
        $chart->labels($tasks->pluck('date')->unique());
        $chart->dataset('Complete', 'line', $tasks->where('status', 'complete')->pluck('count'))->options($this->options3);
        $chart->dataset('Pending', 'line', $tasks->where('status', 'pending')->pluck('count'))->options(['backgroundColor' => '#EEB2A3']);
        $chart->dataset('Declined', 'line', $tasks->where('status', 'decline')->pluck('count'))->options(['backgroundColor' => 'rgba(112, 118, 140, 0.49)']);
        $counts = Order::select('status', DB::raw('COUNT(*) as count'))->groupBy('status')->get()->pluck('count', 'status');
        $locations = Order::select('status', 'location', DB::raw('COUNT(*) as count'))->groupBy('status', 'location')->get()->groupBy('count', 'location');
        $locationsList = Order::select('location')->distinct()->get();

        $query = Order::select('Location',
            DB::raw('COUNT(*) as TotalTasks'),
            // DB::raw('COUNT(*) as TotalCompletedTasks'),
            DB::raw('SUM(CASE WHEN Status = "decline" THEN 1 ELSE 0 END) as TotalDeclinedTasks'),
            DB::raw('SUM(CASE WHEN Status = "pending" THEN 1 ELSE 0 END) as TotalPendingTasks'),
            DB::raw('SUM(CASE WHEN Status = "complete" THEN 1 ELSE 0 END) as TotalCompleteTasks'))
            ->groupBy('Location');

        // Filter functionality
        $this->filterFunctionality($request, $query);


        $tasksByLocation = $query->paginate(3);


        return view('orders.status-count', [
            'counts' => $counts,
            'total' => $counts->sum(),
            'locations' => $locations,
            'chart' => $chart,
            'tasksByLocation' => $tasksByLocation,
            'locationsList' => $locationsList,
        ]);
    }

    /**
     * @param Request $request
     * @param $query
     * @return void
     */
    public function filterFunctionality(Request $request, $query): void
    {
// Filter by location
        if ($request->has('location')) {
            $query->where('Location', '=', $request->location);
        }

        // Filter by completed tasks
        if ($request->has('complete')) {
            if ($request->completed == 'yes') {
                $query->having('TotalCompleteTasks', '>', 0);
            } else {
                $query->having('TotalCompleteTasks', '=', 0);
            }
        }

        // Filter by declined tasks
        if ($request->has('decline')) {
            if ($request->declined == 'yes') {
                $query->having('TotalDeclinedTasks', '>', 0);
            } else {
                $query->having('TotalDeclinedTasks', '=', 0);
            }
        }

        // Filter by pending tasks
        if ($request->has('pending')) {
            if ($request->pending == 'yes') {
                $query->having('TotalPendingTasks', '>', 0);
            } else {
                $query->having('TotalPendingTasks', '=', 0);
            }
        }
    }

    /**
     * @param Request $request
     * @param $query

     */

    public function AreaChart(){
//        Query my data here.

        return view('orders.index');
    }
}
