<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\Admin\Users\LoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ListingController::class, 'index']);

// create new job
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Single listing store
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Manage Listings
Route::get('/listings/manage',[ListingController::class,'manage'])->middleware('auth');

// Single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// update listing
Route::put('/listings/{listing}',[ListingController::class, 'update'])->middleware('auth');



// delete listing
Route::delete('/listings/{listing}',[ListingController::class, 'destroy'])->middleware('auth');


// show edit form
Route::get('listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Show register/Create form
Route::get('/register',[UserController::class,'create'])->middleware('guest');

// Create New User
Route::post('/users',[UserController::class, 'store']);

//log User Out
Route::post('/logout',[UserController::class,'logout'])->middleware('auth');

// Show login form
Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');

// login user
Route::post('/users/authenticate',[UserController::class,'authenticate']) ;




// Show create form
// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/hello', function () {
//     return response('<h1>HELLO GUYS</h1>', 200);
// });
// Route::get('/posts/{id}', function ($id) {
//     dd($id);
//     return response('Posts' . $id);
// })->where('id', '[0-9]+');
// Route::get('/search', function (Request $request) {
//     return ($request->name . ' ' . $request->city);
//     // echo $request->name;
//     // echo $request->city;
// });

// Route::get('admin/users/login', [LoginController::class, 'index']);
