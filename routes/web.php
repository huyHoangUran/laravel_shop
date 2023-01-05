<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\ListingController;
use App\Models\Listing;
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
Route::get('/listings/create', [ListingController::class, 'create']);

// Single listing store
Route::post('/listings', [ListingController::class, 'store']);

// Single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// show edit form
Route::get('listings/{listing}/edit', [ListingController::class, 'edit']);

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
