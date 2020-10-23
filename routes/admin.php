<?php
use Illuminate\Support\Facades\Route;

Route::get('/admin1/index1', 'DashboardController@index1')->name('admin.welcome1');
Route::get('/admin1/{any}',function($any){
    return view('admin.welcome1');
})->where('any','.*');


Route::group(['prefix'=>'admin', 'middleware' => 'guest:admin'], function () {
    Route::get('login', 'LoginController@getLogin')->name('get.admin.login');
    Route::post('login', 'LoginController@login')->name('admin.login');
    Route::post('logout', 'LoginController@logout')->name('admin.logout');
    Route::get('index1', 'DashboardController@index1')->name('admin.welcome1');
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
            Route::get('/subcategory/{cat_id}', 'CategoryController@getcategory');
////////////////////////Sub Category Route ////////////////////////////////////
            Route::resource('subcategories','SubCategoryController');
            Route::get('subcategories/editactive/{cat_id}', 'SubCategoryController@editactive')->name('subcategories.editactive');
///////////////////////Product Route ////////////////////////////////////
            Route::resource('products','ProductController');
            Route::get('products/editactive/{cat_id}', 'ProductController@editactive')->name('products.editactive');
//////////////////////////Tag Route ///////////////////////////////////////
            Route::resource('tags','TagController');
            Route::get('tags/editactive/{cat_id}', 'TagController@editactive')->name('tags.editactive');
//////////////////////////Client Route ///////////////////////////////////////
            Route::resource('clients','ClientController');
            Route::get('clients/editactive/{client_id}', 'ClientController@editactive')->name('clients.editactive');

        });
    });

