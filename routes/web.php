<?php

use Illuminate\Support\Facades\Route;

use App\Htpp\Controllers\PostController;

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
    return view('posts.index');
});

// La route-ressource => Les routes "post.*"
Route::resource("posts", App\Http\Controllers\PostController::class);
