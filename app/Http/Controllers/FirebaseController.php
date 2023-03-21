<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Auth;
use Kreait\Firebase\Contract\Database;

class FirebaseController extends Controller
{

    public function __construct(Database $database, Request $request)
    {
        $this->database = $database;
        $this->ref_tablename = 'Order';
        $this->orderData = [
            "location" => $request->location,
            "status" => $request->status,
        ];

    }

    public function index()
    {
        $i = 1;
        $orders = $this->database->getReference($this->ref_tablename)->getValue();
        return view('users.noti', ['orders' => $orders, 'i' => $i]);
    }


    public function create()
    {

//        $orders = $this->database->getReference('Order');

        return view('orders.add-order');
    }

    public function store(Request $request)
    {


        $orderRef = $this->database->getReference($this->ref_tablename)->push($this->orderData);
//
//        $orderKey = $orderRef->getKey(); // The key looks like this: -KVquJHezVLf-lSye6Qg
//        echo '<pre>';
//        print_r($orderKey);
//        echo '</pre>';

        return $orderRef ? redirect('users/noti')->with('status', 'Order added successfully') : redirect('users/noti')->with('status', 'Order not added');
    }

    public function edit($id){
        $key = $id;

        $editData = $this->database->getReference($this->ref_tablename)->getChild($key)->getValue();

        return $editData ? view('orders.edit', ['editData' => $editData, 'key' => $key]) : redirect('/users/noti')->with('status', 'Order data ID not found');
    }

    public function update(Request $request, $id){
        $key=$id;
        $orderUpdate = $this->database->getReference($this->ref_tablename.'/'.$key)
        ->update($this->orderData);

        return $orderUpdate ? redirect('/users/noti')->with('status', 'Order update successfully') : redirect('/users/noti')->with('status', 'Order  update not successfully');
    }

    public function destroy($id){
        $key = $id;
        $deleteOrder = $this->database->getReference($this->ref_tablename.'/'.$key)->remove();
        return $deleteOrder ? redirect('/users/noti')->with('status', 'Order with id '.$key.' deleted') : redirect('/users/noti')->with('status', ' Order with id '.$key.' not deleted');
    }
    public function AuthService(Auth $auth)
    {
        $this->auth = $auth;
    }


    public function getOrder()
    {
        $user = $this->database->getReference('Order');

        echo '<pre>';
        print_r($user->getvalue());
        echo '</pre>';

    }
}
