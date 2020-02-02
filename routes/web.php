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

Route::resource('/page', 'Dashboard\PageCrawlerController');
Route::get('/page-lists', 'Dashboard\PageCrawlerController@lists');
Route::get('/lists', 'Dashboard\PageCrawlerController@pageLists');
Route::get('/update-details-job', 'Dashboard\PageCrawlerController@updateJobs');
