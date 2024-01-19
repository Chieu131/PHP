<?php

use Illuminate\Support\Facades\Route;

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
});
Route::get('about', function () {
    return 'ChieuD';
});

Route::get('about/directions', function () {
    return 'ChieuD';
});

Route::any('submit-from', function () {
   return 'ChieuD' ;
});

route::get('about/{theSubject}' , function($theSubject) {
    return $theSubject. 'Content goes here';
});

route::get ('where',function() {
    return redirect::to('about/directions');
});

Route::get('about/{theSubject}', 'App\Http\Controllers\AboutController@showSubject');

Route::get('about/classes/{theSubject}', function ($theSubject) {
    return " Content on $theSubject ";
});

Route::get('about/classes/{theArt}/{thePrince}',function ($theArt, $thePrince) {
    return "The product: $theArt and $thePrince";
});
