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

Route::get('/','Admin\Beranda_Controller@view');
Route::get('/list','Admin\Beranda_Controller@search')->name('search');


Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
});


Route::get('detail/{article_id}', 'Admin\Beranda_Controller@detail')->name('beranda.detail');
Route::post('comments/{article_id}', 'Admin\Beranda_Controller@comments')->name('beranda.comments');
Route::get('article/categories/{id}','Admin\Beranda_Controller@category')->name('article.category');


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

    //Manage Commentar
    Route::get('comments','Admin\Comment_Controller@index')->name('manage.comments');
    Route::delete('comments/delete/{comment_id}','Admin\Comment_Controller@delete')->name('delete.comment');


    //Manage Iklan
    Route::get('ads','Admin\Iklan_Controller@index')->name('ads.index');
    Route::post('ads','Admin\Iklan_Controller@store')->name('ads.store');

});

