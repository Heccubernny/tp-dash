<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index']);


Route::get('/orders/status-count', [OrderController::class,
    'countOrdersByStatus',
    //'countOrdersByLocation'
])->name('orders.status-count');


Route::get('orders', [OrderController::class, 'index'])->name('orders.index');

Route::get('dashboard', function(){
    return view('dashboard.index');
});


// Route::get('/image/supload', [ImageController::class, 'index']);
Route::resource('/image', ImageController::class);


Route::get('serviceprovider/export/', [ServiceProviderController::class, 'export']);
Route::get('user/export/', [UserController::class, 'export']);
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('user-store');


// Pure template design
Route::get('/dashboard/users', function () {
    return view('dashboard.users');
})->name('dashboard-users');
