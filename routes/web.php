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

use App\Murajaah;
use Illuminate\Support\Facades\Request;

Route::get('/', 'IniController@index');

Route::get('baru', 'IniController@baru');
Route::post('baru', function(){
	Murajaah::create([
		'tanggal' => Request::input('tanggal'),
		'jumlah_halaman' => Request::input('jumlah_halaman')
	]);
	return Redirect::to('/');
});
Route::get('{id}/hapus', function($id){
	Murajaah::destroy($id);
	return Redirect::to('/');
});
Route::get('{id}/edit', 'IniController@edit');
Route::post('{id}/edit', function($id){
	Murajaah::find($id)->update([
		'tanggal' => Request::input('tanggal'),
		'jumlah_halaman' => Request::input('jumlah_halaman')
	]);
	return Redirect::to('/');
});