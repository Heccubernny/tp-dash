<?php

namespace App\Http\Controllers;

use App\Models\ServiceProvider;
use Illuminate\Http\Request;
use App\Exports\ServiceProviderExport;
use Kreait\Firebase\Contract\Database;
use Maatwebsite\Excel\Facades\Excel;

class ServiceProviderController extends Controller
{
    public function __construct(Database $database, Request $request)
    {
        $this->database = $database;
        $this->ref_tablename = 'users';
//        $this->orderData = [
//            "address" => $request->address,
//            "status" => $request->status,
//        ];

    }
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        //
        $service_providers = $this->database->getReference('users')
            ->orderByChild('isCustomer')
            ->equalTo(false)
            ->getSnapshot()
            ->getValue();



        return view('users.index', compact('service_providers'));
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
    public function show(ServiceProvider $serviceProvider)
    {
        //
//        $key = $id;

        $service_providers = $this->database->getReference('users')
            ->orderByChild('isCustomer')
            ->equalTo(false)
            ->getSnapshot()
            ->getValue();

        $service_info = $this->database->getReference("MY_SUB_SERVICE_PATH")->getSnapShot()->getValue();

        $verified_users = $this->database->getReference('verification_data')
            ->orderByChild('isVerified')
            ->equalTo(false)
            ->getSnapshot()
            ->getValue();

        $customer_users = array_filter($service_providers, function($sp) {
            return !$sp['isCustomer'];
        });

        $matched_users = array_intersect_key($verified_users, $customer_users);
//TODO:: The logic to query the User details I will later convert it into Reusable function. here it will output a verification Icon
        foreach ($matched_users as $user_id => $user_data) {
           $matched_users[$user_id]['isVerified'] == false ? "IS not verifed" : "verified";

        }


        return view('service_provider.details', compact('service_providers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceProvider $serviceProvider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceProvider $serviceProvider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceProvider $serviceProvider)
    {
        //
    }

    public function export()
    {
        return Excel::download(new ServiceProviderExport, 'serviceProvider.xlsx');
    }
}
