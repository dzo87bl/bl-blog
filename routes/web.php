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

Route::group(['middleware' => ['web']], function(){

});

/* Welcome Route */

Route::get('/', 'PageController@getWelcome');
Route::get('blog/{slug}', ['uses' => 'BlogController@getArticle', 'as' => 'blog.article',]); //->where('slug', '[w\d\-\_]+')

/* Auth Routes */

Auth::routes();

/* Home Route */

Route::get('/home', 'HomeController@index')->name('home');

/* Pages Routes */

Route::get('/about', 'PageController@getAbout');
Route::get('/contact', 'PageController@getContact');
Route::post('/contact', 'PageController@postContact');
Route::post('/search', 'PageController@postSearch');

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('optimize');
    //Artisan::call('route:cache');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    //Artisan::call('config:cache');
    return back()->with('success', 'Cache is successfully clean!');
});

/* Categories Routes */

Route::resource('categories', 'CategoryController');

/* Articles Routes */

Route::resource('articles', 'ArticleController');

/* Tags Routes */

Route::resource('tags', 'TagController');

/* Comments Routes */

Route::resource('comments', 'CommentController');