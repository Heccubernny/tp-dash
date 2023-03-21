<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Kreait\Firebase\Contract\Database;
use Kreait\Firebase\Contract\Auth as FirebaseAuth;
use Kreait\Firebase\Contract\Firestore;
use Kreait\Firebase\Contract\Storage;

class AdminDashboardController extends Controller
{

    public function __construct(Database $database, Firestore $firestore, Storage $storage, Request $request, FirebaseAuth $auth)
    {
        $this->database = $database;
        $this->ref_tablename = 'Admin';
        $this->auth = $auth;
        $this->firestore = $firestore;
        $this->storage = $storage;
        $this->role = ($request->input('role') == 'Administrator') ? 'Administrator' : 'Admin';
        $this->firebase_storage_path = 'Admin/';
        $this->image = $request->file('image'); //image file from frontend

        $this->adminData = [
            'image' => $this->image,
            'fullname' => $request->input('name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'password' => $request->input('password'),
            'role' => $this->role,
        ];

//        $this->getimage = pathinfo($this->image->getClientOriginalName(), PATHINFO_FILENAME);
        if ($request->hasFile($this->image)) {
            $this->admin  = $this->firestore->database()->collection('Images')->document('defT5uT7SDu9K5RFtIdl');
            $this->name = $this->admin->id();
            $this->localfolder = public_path('firebase-temp-uploads') .'/';

            $file = $request->file($this->image);
            $this->extension = $file->getClientOriginalExtension();
            // Do something with the file
            $this->file = $this->name .'.'.$this->extension;

        }

//        $this->extension = $this->image->getClientOriginalExtension();
    }

    /**
     * Display a listing of the resource.
     */
    public function index($title='admin')
    {
        $admin = $this->database->getReference($this->ref_tablename)->push($this->adminData);

//        $image= $this->storage->getBucket()->object($this->firebase_storage_path.$this->file);
        return view('admin.roles', compact('admin', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
 {
        //
        $admin = $this->database->getReference($this->ref_tablename)->push($this->adminData);

        return view('admin.roles', compact('admin'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validating incoming request
        $request->validate( [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'fullname' => 'required',
            'email' => 'required|email|unique:admin', //check
            'mobile' => 'required',
            'password' => 'required|min:6',
            'role' => 'required|in:Administrator,Admin',
        ]);
//
//        $user = $this->auth->createUserWithEmailAndPassword(
//            $request->input('email'),
//            $request->input('password')
//        );

        $getimage = pathinfo($this->image->getClientOriginalName(), PATHINFO_FILENAME);
        $adminImg = $this->firestore->database()->collection('Admin')->document($getimage);
        $firebase_storage_path = 'Admin/';
        $name = $adminImg->id();
        $localfolder = public_path('Admin-images') .'/';
        $extension = $this->image->getClientOriginalExtension();
        $file = $name.'.'.$extension;

        if ($this->image->move($localfolder, $file)) {
            $uploadedfile = fopen($localfolder.$file, 'r');
            $this->storage->getBucket()->upload($uploadedfile, ['name' => $firebase_storage_path . $file]);
            //will remove from local laravel folder
            unlink($localfolder . $file);
            Session::flash('message', 'Succesfully Uploaded');
        }

        $admin = $this->database->getReference($this->ref_tablename)->push($this->adminData);
//        if($adminRef){
//            return redirect('admin/upload')->with('status', 'Admin added successfully') ;
//        }
//        else{
//            redirect('admin/upload')->with('status', 'Admin not added');
//        }
//        return back()->withInput();
//        dd($user);

        // Set the user's role based on the value of the `role` field

// Save the user's data to the Firebase database
//        $adminRef=$this->database->getReference($this->ref_tablename . $user->uid)->push($this->adminData);
//        dd($adminRef);

        return redirect()->back()->with('message', 'Successfully Add New Admin');

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
