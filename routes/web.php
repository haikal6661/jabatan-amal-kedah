<?php

use App\Http\Controllers\MemberController;
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


Auth::routes();

// Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');


Route::group(['middleware' => 'auth'], function () {
	// Route::get('/', function () {
	// 	return view('dashboard');
	// });
	Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons'); 

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');

	Route::group(['middleware' => ['role:Admin']], function(){
		Route::get('/edit_ahli/{id}',[MemberController::class, 'edit']);
		Route::post('/update/{id}',[MemberController::class, 'update']);
		Route::get('/tambah_ahli',[MemberController::class, 'create'] );
		Route::post('/tambah_ahli',[MemberController::class, 'store'] );
		Route::get('delete/{id}',[MemberController::class, 'destroy']);
		Route::get('member',[MemberController::class, 'index']);
		Route::get('daftar','App\Http\Controllers\PenggunaController@create')->name('daftar');
		Route::post('daftar','App\Http\Controllers\PenggunaController@store');
		Route::get('senarai_pengguna','App\Http\Controllers\PenggunaController@index')->name('senarai-pengguna');
		Route::get('/edit_pengguna/{id}','App\Http\Controllers\PenggunaController@edit')->name('edit-pengguna');
		Route::post('/update/{id}','App\Http\Controllers\PenggunaController@update')->name('update-pengguna');
		Route::get('delete_pengguna/{id}','App\Http\Controllers\PenggunaController@destroy');
	});

	Route::group(['middleware' => ['role:Admin|Admin_Kawasan']], function(){
		Route::get('/edit_ahli/{id}',[MemberController::class, 'edit']);
		Route::post('/update/{id}',[MemberController::class, 'update']);
		Route::get('/tambah_ahli',[MemberController::class, 'create'] );
		Route::post('/tambah_ahli',[MemberController::class, 'store'] );
		Route::get('member',[MemberController::class, 'index']);
		Route::get('/view_ahli/{id}',[MemberController::class, 'show']);
		// Route::get('member',[MemberController::class, 'search']);
	});

	// Route::get('member',[MemberController::class, 'index']);
	// Route::get('/view_ahli/{id}',[MemberController::class, 'show']);
	// Route::get('member',[MemberController::class, 'search']);
	// Route::get('/',[HomeController::class, 'ahlibaru']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

Route::get('/up', function() {
    \Artisan::call('up');

    return "up";
});

Route::get('/down', function() {
    \Artisan::call('down --secret=1234');

    return "down";
});

