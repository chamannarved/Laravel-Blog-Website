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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});

// Get all published posts
Route::get('/', 'BlogController@getPosts');

// Get posts for a given tag
Route::get('tag/{slug}', 'BlogController@getPostsByTag');

// Get posts for a given topic
Route::get('topic/{slug}', 'BlogController@getPostsByTopic');

// Find a single post
Route::middleware('Canvas\Http\Middleware\Session')->get('{slug}', 'BlogController@show');
