<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Charts\TaskChart;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $chart = new TaskChart;
    //     $data1 = Order::select('location', 'created_at')->get()->groupBy('created_at');
    //     $data2 = Order::select('status', 'created_at')->get()->groupBy('created_at');

    //     $chart->labels(['One', 'Two']);
    //     $chart->dataset('Order Location', 'line',
    //     // [9,8,7,6,5,4,3,2,1]
    //     $data1
    // );
    //     $chart->dataset('Status', 'line',
    //     //  [1,2,3,4,5,6,7,8,9]
    //     $data2
    //     );
    //     $chart->loaderColor('#0fe');
$chart->labels(['One', 'Two', 'Three', 'Four']);
$chart->dataset('My dataset', 'line', [1, 2, 3, 4]);
$chart->dataset('My dataset 2', 'line', [4, 3, 2, 1]);
        // $chart->height(200);
        // $chart->width(200);

        // $chart->loader(false);

        return view('orders.index',  ['chart' => $chart]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }


    // Custom function
    public function countOrdersByStatus(){
        $counts = Order::select('status', DB::raw('COUNT(*) as count'))->groupBy('status')->get()->pluck('count', 'status');
        $orderPage = Order::select('location', DB::raw('COUNT(*) as count'))->groupBy('location')->paginate(5);
        $locations = Order::select('status','location', DB::raw('COUNT(*) as count'))->groupBy('status','location')->get()->groupBy('count', 'location');
        return view('orders.status-count', [
            'counts' => $counts,
            'total' => $counts->sum(),
            'orderPage' => $orderPage,
            'locations' => $locations,
        ]);
    }

// public function countOrdersByLocation(){
//     $locations = Order::select('location', DB::raw('COUNT(*) as count'))->groupBy('location')->get()->pluck('count', 'location');
//     return view('orders.location-count', [
//         'locations' => $locations,
//         'total' => $locations->sum()
//     ]);
// }


    // public function countOrdersByLocation(){
    //     $locations = Order::select('status','location', DB::raw('COUNT(*) as count'))->groupBy('status','location')->get()->groupBy('count', 'location');
    //     return view('orders.status-count', [
    //         'locations' => $locations,
    //         'total_location' => $locations->sum('count')

    //     ]);
    // }
    }
