<?php
use Illuminate\Support\Facades\Route;


Route::group(['prefix'=>'admin', 'middleware' => 'guest:admin'], function () {
    Route::get('login', 'LoginController@getLogin')->name('get.admin.login');
    Route::post('login', 'LoginController@login')->name('admin.login');
    Route::post('logout', 'LoginController@logout')->name('admin.logout');
});

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],
    function(){
        Route::prefix('admin')->name('admin.')->middleware(['auth:admin'])->group(function(){
            Route::get('/','DashboardController@index')->name('welcome');
////////////////////////Admin Route ////////////////////////////////////////
            Route::resource('users','UserController');
            Route::get('users/editactive/{cat_id}', 'UserController@editactive')->name('users.editactive');
//////////////////////// Category Route ////////////////////////////////////
            Route::resource('categories','CategoryController');
            Route::get('categories/editactive/{cat_id}', 'CategoryController@editactive')->name('categories.editactive');
////////////////////////Sub Category Route ////////////////////////////////////
            Route::resource('subcategories','SubCategoryController');
            Route::get('subcategories/editactive/{cat_id}', 'SubCategoryController@editactive')->name('categories.editactive');

        });
    });

