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
Route::get('/', function () {
    return redirect('/dashboard');
});
Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->name('admin.dashboard');

Route::get('/jurusan', 'AdminController@jurusanList')->name('admin.jurusan.list');
Route::get('/jurusan/{id}', 'AdminController@jurusanEdit')->name('admin.jurusan.edit');
Route::post('/jurusan/save', 'AdminController@jurusanSave')->name('admin.jurusan.save');
Route::post('/jurusan/delete/{id}', 'AdminController@jurusanDelete')->name('admin.jurusan.delete');
Route::get('/hasil/{id}', 'AdminController@hasilList')->name('admin.hasil.list');
Route::get('/calonmahasiswa', 'AdminController@calonMahasiswaList')->name('admin.calonmahasiswa.list');
Route::get('/calonmahasiswa/{id}', 'AdminController@calonMahasiswaEdit')->name('admin.calonmahasiswa.edit');
Route::post('/calonmahasiswa/save', 'AdminController@calonMahasiswaSave')->name('admin.calonmahasiswa.save');
Route::post('/calonmahasiswa/delete/{id}', 'AdminController@calonMahasiswaDelete')->name('admin.calonmahasiswa.delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
