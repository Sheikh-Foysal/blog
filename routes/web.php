<?php

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

Route::get('/','HomeController@index')->name('home');

Route::get('post/{slug}', 'PostController@details')->name('post.details');

Route::post('subscriber', 'SubscriberController@store')->name('subscriber.store');

Auth::routes();

Route::group(['middleware'=>['auth']], function(){
    Route::post('favorite/{post}/add', 'FavoriteController@add')->name('post.favorite');
});


Route::group(['as'=>'admin.', 'prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth','admin']],function(){
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('settings', 'SettingsController@index')->name('settings');
    Route::put('profile-update', 'SettingsController@updateProfile')->name('profile.update');
    Route::put('password-update', 'SettingsController@updatePassword')->name('password.update');

    Route::resource('tag', 'TagController');
    Route::resource('category', 'CategoryController');
    Route::resource('post', 'postController');
    Route::get('pending/post', 'postController@pending')->name('post.pending');
    Route::put('/post/{id}/approve', 'postController@approval')->name('post.approve');

    Route::get('/favorite', 'FavoriteController@index')->name('favorite.index');
    
    Route::get('/subscriber', 'SubscriberController@index')->name('subscriber.index');
    Route::delete('/subscriber/{subscriber}', 'SubscriberController@destroy')->name('subscriber.destroy');
    
});

Route::group(['as'=>'author.', 'prefix'=>'author', 'namespace'=>'Author', 'middleware'=>['auth','author']],function(){
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('post', 'postController');
    
    Route::get('settings', 'SettingsController@index')->name('settings');
    Route::put('profile-update', 'SettingsController@updateProfile')->name('profile.update');
    Route::put('password-update', 'SettingsController@updatePassword')->name('password.update');

    Route::get('/favorite', 'FavoriteController@index')->name('favorite.index');

});
