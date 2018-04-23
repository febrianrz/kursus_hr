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
Route::get('/about','AboutController@index')->name('about');
Route::get('/contact','ContactController@index')->name('contact');
Route::get('/blog','BlogController@index')->name('blog');
Route::get('/portofolio','PortofolioController@index')->name('portofolio');
Auth::routes();

Route::middleware(['auth'])->group(function(){
	Route::prefix('admin')->group(function(){
		Route::get('dashboard','Admin\DashboardController@index')
			->name("admin.dashboard");
		Route::prefix('master')->group(function(){
			Route::get('divisi','Admin\Master\DivisiController@index')->name("admin.master.divisi");
			Route::get('divisi/create','Admin\Master\DivisiController@create')->name("admin.master.divisi.create");
			Route::post('divisi/create','Admin\Master\DivisiController@save')->name("admin.master.divisi.save");
			Route::get('divisi/edit/{id}','Admin\Master\DivisiController@edit')->name("admin.master.divisi.edit");
			Route::put('divisi/edit/{id}','Admin\Master\DivisiController@update')->name("admin.master.divisi.update");
			Route::delete('divisi/delete/{id}','Admin\Master\DivisiController@delete')->name("admin.master.divisi.delete");

			Route::get('pegawai','Admin\Master\PegawaiController@index')->name("admin.master.pegawai");
			Route::get('pegawai/create','Admin\Master\PegawaiController@create')->name("admin.master.pegawai.create");
			Route::post('pegawai/create','Admin\Master\PegawaiController@save')->name("admin.master.pegawai.save");			
			Route::get('pegawai/edit/{id}','Admin\Master\PegawaiController@edit')->name("admin.master.pegawai.edit");
			Route::put('pegawai/edit/{id}','Admin\Master\PegawaiController@update')->name("admin.master.pegawai.update");

			Route::get('gaji','Admin\Master\GajiController@index')->name("admin.master.gaji");
			Route::get('gaji/create','Admin\Master\GajiController@create')->name("admin.master.gaji.create");
			Route::post('gaji/create','Admin\Master\GajiController@save')->name("admin.master.gaji.save");
			Route::get('gaji/edit/{id}','Admin\Master\GajiController@edit')->name("admin.master.gaji.edit");
			Route::put('gaji/edit/{id}','Admin\Master\GajiController@update')->name("admin.master.gaji.update");
			Route::delete('gaji/delete/{id}','Admin\Master\GajiController@delete')->name("admin.master.gaji.delete");
		});
	});
});