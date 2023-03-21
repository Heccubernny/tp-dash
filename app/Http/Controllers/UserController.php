<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Client\Events\RequestSending;
use Illuminate\Http\Request;
use App\Exports\UserExport;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Session;
use Kreait\Firebase\Contract\Database;
use Kreait\Firebase\Database\Reference;
use Kreait\Firebase\Contract\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\Pagination\Paginator;

/**
 * The User action controller
 * @property Database $database
 * @property Storage $storage
 * @property string $ref_tablename
 * @property array $userData
 */
class UserController extends Controller
{
//    private Database $database;


    public function __construct(Database $database, Storage $storage, Request $request)
    {
        $this->middleware('auth');
        $this->database = $database;
        $this->storage = $storage;
        $this->ref_tablename = 'users';
        $this->userData = [
            "image" => $request->file('image'),
            "email" => $request->email,
            "address" => $request->address,
            "fullname" => $request->fullname,
            "phone" => $request->phone,
        ];

    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $tab = 'users')
    {

// Define the page size
//        $pageSize = 2; // number of records per page
//        $page = request()->get('page', 1); // current page number
//        $offset = ($page - 1) * $pageSize; // calculate offset based on current page
//// Create a query to get the data from Firebase
//        $query = $this->database->getReference($this->ref_tablename)
//            ->orderByChild('fullName')
//            ->limitToFirst($pageSize)->startAt($offset)->getSnapshot();
//
//// Get the total number of items
//        $totalItems = count($query->getValue());
//
//// Set up the current page based on the "page" query parameter
//        $page = request()->query('page', 1);

        //FirebaseAuth.getInstance().getCurrentUser();
        try {
            $uid = Session::get('uid');
            $user = app('firebase.auth')->getUser($uid);
            return view('home');
        } catch (\Exception $e) {
            return $e;
        }


//        $query = $this->database->getReference($this->ref_tablename);

        $query = $this->database->getReference($this->ref_tablename);
        dd($query);

        // Get the total number of users
        $totalItems = $query->getSnapshot()->numChildren();

        // Define the page size
        $pageSize = 2;

        // Get the current page number
        $page = request()->query('page', 1);

        // Calculate the offset
        $offset = ($page - 1) * $pageSize;

        // Get the users for the current page
        $users = $query->orderByChild('fullName')
            ->limitToFirst($pageSize)
            ->startAt($offset)
            ->getValue();

// Create a new Paginator instance
//        $paginator = new Paginator(
//            $this->database->getReference($this->ref_tablename)->orderByChild('fullName')->limitToLast($totalItems - ($page - 1) * $pageSize)->getValue(), // The data for the current page
//            $pageSize, // The number of items per page
//            $page, // The current page
//            ['path' => request()->url(), 'query' => request()->query()] // The URL path and query string for the links
//        );

        $paginator = new LengthAwarePaginator(
            $users, // The items to paginate
            $totalItems, // The total number of items
            $pageSize, // The number of items per page
            $page, // The current page number
            ['path' => url('users/index/')] // The base URL for pagination links
        );


// Get the paginated data
//        $users = $paginator->items();




        //
//        $users = $this->database->getReference($this->ref_tablename)->getValue();
        // Check if the user is active
//        $lastActivity = $users['lastActivity'];
//        $currentTime = now();

//        if (strtotime($lastActivity) + (5 * 60) < $currentTime->timestamp) {
//            $status = 'inactive';
//        } else {
//            $status = 'active';
//        }
        $activeTab =  $request->input('tab', $tab);
//testing my qery
//        dd($query);
//        $activeTab = $tab
//;
//        echo '<pre>';
//        {{$query}};
//        echo '</pre>';
        return view('users.index', [
            'users' => $users,
//            'status' => $status
            'activeTab' => $activeTab,
            'paginator' => $paginator
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        //

        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $storageClient = $this->storage->getStorageClient();
        $defaultBucket = $this->storage->getBucket();

        return redirect('users/index')->back()->with('success', 'Image uploaded successfully!');
//        return $userRef ? redirect('users/index')->with('status', 'Order added successfully') : redirect('users/index')->with('status', 'Order not added');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    /**
     * @return BinaryFileResponse
     */


    public function export(): BinaryFileResponse
    {
        return Excel::download(new UserExport($this->database), 'User.xlsx');
    }


}
