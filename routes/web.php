<?php

use App\Category;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/contact', function () {
    $categories=Category::defaultCategory()->get();
    $subcategories=Category::subCategory()->get();
    return view('contactus',compact('categories','subcategories'));
});
Route::get('/product_details', function () {
    $categories=Category::defaultCategory()->get();
    $subcategories=Category::subCategory()->get();
    return view('product_details',compact('categories','subcategories'));
});
Route::get('/category', function () {
    $categories=Category::defaultCategory()->get();
    $subcategories=Category::subCategory()->get();
    return view('categories',compact('categories','subcategories'));
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
