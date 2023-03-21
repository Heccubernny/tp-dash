<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\ResetController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ServiceProviderController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Pure template design
Route::get('/dashboard/users', function () {
    return view('dashboard.users');
})->name('dashboard-users');

Route::get('/test', function(){
    $connection = DB::getDefaultConnection();
    echo $connection;

})->name('test');

Route::get('/sp/details', [ServiceProviderController::class, 'show'])->name('sp-details');


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('dashboard', function(){
    return view('dashboard.index');
});
Route::get('admin/edit-roles', function(){
    return view('admin.edit-roles');
});



//Order Controllers
Route::get('/dashboard/overview', [OrderController::class,
    'countOrdersByStatus',
    //'countOrdersByLocation'
])->name('orders.status-count');

Route::get('orders', [OrderController::class, 'AreaChart'])->name('orders.index');


//Admin Controllers
Route::get('/admin/role', [AdminDashboardController::class, 'index'])->name('admin-dashboard');
Route::get('/admin/roles', [AdminDashboardController::class, 'create'])->name('add-admin-roles');
Route::post('/admin/roles', [AdminDashboardController::class, 'store'])->name('store-admin-roles');

//Route::resource('admin/roles', AdminDashboardController::class);


//Image Controllers
//Route::post('/image/supload', [ImageController::class, 'store']);
//Route::get('/image/upload', [ImageController::class, 'upload']);
//Route::post('/admin/upload', [ImageController::class, 'index']);
//Route::get('/admin/upload', [ImageController::class, 'index']);

Route::resource('/admin/upload', ImageController::class);

//TODO::Authentication Issue
//Service Provider Controllers
Route::get('serviceprovider/export/', [ServiceProviderController::class, 'export']);

Route::get('user/export/', [UserController::class, 'export'])->name('user-export');

Route::get('/users/index/{tab?}', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users/index', [UserController::class, 'store'])->name('users.store');
//    ->middleware('fireauth');




//Firebase Route
Route::get('users/noti', [FirebaseController::class, 'index'])->name('users_noti');
Route::get('orders/add', [FirebaseController::class, 'create'])->name('orders.add');
Route::get('edit-order/{id}', [FirebaseController::class, 'edit'])->name('orders.edit');
Route::post('orders/add', [FirebaseController::class, 'store'])->name('orders.add-order');
Route::put('update-order/{id}', [FirebaseController::class, 'update'])->name('orders.update');
Route::get('get-firebase-data', [FirebaseController::class, 'getOrder'])->name('firebase.index');
Route::get('delete-order/{id}', [FirebaseController::class, 'destroy'])->name('orders.delete');

Auth::routes();
//
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware(['user','fireauth']);
//Route::post('login/{provider}/callback', 'Auth\LoginController@handleCallback');
Route::get('/email/verify', [ResetController::class, 'verify_email'])->name('verify')->middleware('fireauth');
Route::post('/email/verify', [ResetController::class, 'verify_email'])->name('verify_post')->middleware('fireauth');

Route::post('login/{provider}/callback', [LoginController::class, 'handleCallback']);

Route::resource('/profile', ProfileController::class)->middleware(['user','fireauth']);

Route::resource('/password/reset', ResetController::class);
