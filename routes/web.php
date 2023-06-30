<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ImagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [EmployeeController::class, 'index']);

Route::resource('/product', ProductController::class);

Route::controller(ImagesController::class)->group(function () {
    Route::get('image-upload', 'index');
    Route::post('image-upload', 'imageUpload')->name('image.store');
});
