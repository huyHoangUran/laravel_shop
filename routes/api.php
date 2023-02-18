<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ListingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/postss', function () {
    return response()->json([
        'posts' => [
            [
                'title' => 'header',
                'name' => 'Hoang'
            ]
        ]
    ]);
});

// Route::apiResource('/all',[lis])
Route::get('/all', [ListingController::class, 'index']);

// Route::get()




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
