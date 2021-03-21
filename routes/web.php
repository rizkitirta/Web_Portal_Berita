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

use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
});

    Route::get('detail/{article_id}', 'Admin\Beranda_Controller@detail')->name('beranda.detail');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/admin', 'Admin\Beranda_Controller@index');

    //Manage Category
    Route::get('category', 'Admin\Category_Controller@index')->name('category.index');
    Route::get('category/add', 'Admin\Category_Controller@add')->name('category.add');
    Route::post('category/add', 'Admin\Category_Controller@store')->name('category.store');

    //Edit & Update Category
    Route::get('category/edit/{id}', 'Admin\Category_Controller@edit')->name('category.edit');
    Route::post('category/edit/{id}', 'Admin\Category_Controller@update')->name('category.update');
    Route::delete('category/delete/{id}', 'Admin\Category_Controller@delete')->name('category.delete');

    //Manage Article
    Route::get('article', 'Admin\Article_Controller@index')->name('article.index');
    Route::get('article/add', 'Admin\Article_Controller@add')->name('article.add');
    Route::post('article/add', 'Admin\Article_Controller@store')->name('article.store');

    //Article Edit
    Route::get('article/edit/{article_id}', 'Admin\Article_Controller@edit')->name('article.edit');
    Route::post('article/edit/{article_id}', 'Admin\Article_Controller@update')->name('article.update');
    Route::delete('article/delete/{article_id}', 'Admin\Article_Controller@delete')->name('article.delete');



});

