<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>['auth']],function(){
    Route::get('/dashboard','App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::resource('biro','App\Http\Controllers\BiroController');
    Route::resource('deskripsi', 'App\Http\Controllers\DeskripsiController');
    Route::resource('buktikerja', 'App\Http\Controllers\BuktiKerjaController');
    Route::resource('unitkerja', 'App\Http\Controllers\UnitKerjaController');
    Route::resource('history', 'App\Http\Controllers\HistoryController');
    Route::get('archive', 'App\Http\Controllers\HistoryController@archive')->name('archive');
    Route::resource('bulan', 'App\Http\Controllers\BulanController');
});
Route::group(['middleware'=>['auth','role:admin']],function(){
    Route::get('/report-biro','App\Http\Controllers\HistoryController@reportBiro')->name('reportbiro.index');

});

Route::group(['middleware'=>['auth','role:user']],function(){
    Route::get('/dashboard/profile','App\Http\Controllers\DashboardController@profile')->name('dashboard.profile');

});

Route::get('/clear', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
require __DIR__.'/auth.php';
