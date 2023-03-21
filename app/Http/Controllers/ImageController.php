<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Kreait\Firebase\Contract\Storage;
use Kreait\Firebase\Contract\Firestore;
use Kreait\Firebase\Contract\Auth as FirebaseAuth;
use Kreait\Firebase\Auth\SignInResult;
use Kreait\Firebase\Exception\FirebaseException;
use Google\Cloud\Firestore\FirestoreClient;
class ImageController extends Controller
{
    private Firestore $firestore;

    public function __construct(Firestore $firestore, Storage $storage)
    {
        $this->firestore = $firestore;
        $this->storage = $storage;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //TODO::Query the image from the firebase storage
        $expiresAt = new \DateTime('tomorrow');
//
//        $this->firestore->database()->blob();
        $imageReference = $this->storage->getBucket()->object("Images/");

        if ($imageReference->exists()) {
            $image = $imageReference->signedUrl($expiresAt);
        } else {
            $image = null;
        }


        return view('admin.image-upload', compact('image'));

    }

    /**
     * Show the form for creating a new resource.
     */


    public function create()
    {
        //

    }


    function uploadImage($request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $getimage = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $service = $this->firestore->database()->collection('Images')->document($getimage);
        $firebase_storage_path = 'Images/';
        $name = $service->id();
        $localfolder = public_path('firebase-temp-uploads') . '/';
        $extension = $image->getClientOriginalExtension();
        $file = $name . '.' . $extension;
        if ($image->move($localfolder, $file)) {
            $uploadedfile = fopen($localfolder . $file, 'r');
            $this->storage->getBucket()->upload($uploadedfile, ['name' => $firebase_storage_path . $file]);
            unlink($localfolder . $file);
            Session::flash('message', 'Successfully Uploaded');
            return $file;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //TODO::Controller to add image from client side to the firebase cloud storage
//        $request->validate([
//            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//        ]);
//
////        $input = $request->all();
//
//        $image = $request->file('image'); //image file from frontend
////
//        $getimage = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
//        $service  = $this->firestore->database()->collection('Images')->document($getimage);
//        $firebase_storage_path = 'Images/';
//        $name = $service->id();
//        $localfolder = public_path('firebase-temp-uploads') .'/';
//        $extension = $image->getClientOriginalExtension();
//        $file = $name .'.'.$extension;
//        if ($image->move($localfolder, $file)) {
//            $uploadedfile = fopen($localfolder.$file, 'r');
//            $this->storage->getBucket()->upload($uploadedfile, ['name' => $firebase_storage_path . $file]);
//            //will remove from local laravel folder
//            unlink($localfolder . $file);
//            Session::flash('message', 'Succesfully Uploaded');
//        }
        $imageFilename = uploadImage($request);
        return back()->withInput();
//        $imageName = time().'.'.$request->image->extension();
//        // $request->move(public_path('images'), $imageName);
//        $request->image->storeAs('public/images', $imageName);

//        return redirect()->route('admin.image-upload')->with('success','Company has been uploaded successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
//        $database = $this->firestore->database();
//        $collectionReference = $database->collection('Admin');
//        dd($collectionReference);
//        $documentReference = $collectionReference->document();
//        $snapshot = $documentReference->snapshot();
//
//        echo "Hello " . $snapshot['firstName'];

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image, Request $request)
    {
        //
        $imageDeleted = app('firebase.storage')->getBucket()->object("Images/defT5uT7SDu9K5RFtIdl.png")->delete();
        Session::flash('message', 'Image Deleted');
        return back()->withInput();
    }

    public function upload(Request $request)
    {
        //
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        // $request->move(public_path('images'), $imageName);
        $request->image->storeAs('public/images', $imageName);

        return redirect()->route('orders.index')->with('success','Company has been uploaded successfully');
    }

}
