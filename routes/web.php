<?php

use App\Category;
use App\Product;
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
    $categories=Category::defaultCategory()->where('active',1)->get();
    $subcategories=Category::subCategory()->get();
    return view('contactus',compact('categories','subcategories'));
})->name('contactus');
Route::get('/product_details/{id}', 'HomeController@product_details')->name('product_details');
Route::get('/category/{id}', 'HomeController@categories');
Route::get('/category_ajax/{id}', 'HomeController@categoriesajax');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::post('/addproductcard', 'HomeController@addproductcard')->name('addproductcard');
Route::get('/cart', 'HomeController@cart')->name('cart');
Route::get('/favorite', 'HomeController@favorite')->name('favorite');
Route::post('/addfavorite', 'HomeController@addfavorite')->name('addfavorite');
Route::post('/addcomment', 'HomeController@addcomment')->name('addcomment');
