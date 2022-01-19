<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//      return view('');
// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
Route::middleware(['auth'])->group(function(){ 
    
     Route::get('/AddWedding', [App\Http\Controllers\weddingController::class, 'showform'])->name('Wedding');

     Route::post('/AddWedding', [App\Http\Controllers\weddingController::class, 'insert'])->name('InsertWedding');

     Route::get('/home', [App\Http\Controllers\weddingController::class, 'viewWedding']);

     Route::delete('/weddingdetail/{id}', [App\Http\Controllers\weddingController::class, 'destroy'])->name('deletewedding');

     Route::get('/', function () {
     return view('about');
     });

     Route::get('/about', function () {
          return view('about');
     });

});

