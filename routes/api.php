<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//Route::get('login', 'API/LoginController@getLogin')->name('get.admin.login');
//Route::post('login', 'API/LoginController@login')->name('admin.login');
//Route::post('logout', 'API/LoginController@logout')->name('admin.logout');
Route::get('categories/index', 'API\Admin\CategoryController@index');
Route::get('categories/edit/{id}', 'API\Admin\CategoryController@show');
Route::post('categories/create', 'API\Admin\CategoryController@store');
Route::post('setting/global_numbering/store', 'API\Admin\DashboardController@store_global_numbering');
Route::post('setting/general_ledger/add_account', 'API\Admin\DashboardController@add_account');

//Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
//    function () {
//        Route::prefix('admin')->name('admin.')->middleware(['auth:admin'])->group(function () {
//            Route::get('/', 'DashboardController@index')->name('welcome');
//////////////////////////Admin Route ////////////////////////////////////////
//            Route::resource('users', 'UserController');
//            Route::get('users/editactive/{cat_id}', 'UserController@editactive')->name('users.editactive');
////////////////////////// Category Route ////////////////////////////////////
//            Route::resource('categories', 'CategoryController');
//            Route::get('categories/editactive/{cat_id}', 'CategoryController@editactive')->name('categories.editactive');
//            Route::get('/subcategory/{cat_id}', 'CategoryController@getcategory');
//////////////////////////Sub Category Route ////////////////////////////////////
//            Route::resource('subcategories', 'SubCategoryController');
//            Route::get('subcategories/editactive/{cat_id}', 'SubCategoryController@editactive')->name('subcategories.editactive');
/////////////////////////Product Route ////////////////////////////////////
//            Route::resource('products', 'ProductController');
//            Route::get('products/editactive/{cat_id}', 'ProductController@editactive')->name('products.editactive');
////////////////////////////Tag Route ///////////////////////////////////////
//            Route::resource('tags', 'TagController');
//            Route::get('tags/editactive/{cat_id}', 'TagController@editactive')->name('tags.editactive');
////////////////////////////Client Route ///////////////////////////////////////
//            Route::resource('clients', 'ClientController');
//            Route::get('clients/editactive/{client_id}', 'ClientController@editactive')->name('clients.editactive');
//
//        });
//    });
