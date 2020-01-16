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

Route::get('/', 'HomeController@landing');

Auth::routes();

Route::get('/admin/dashboard', 'AdminDashboard@index')->name('dashboard_admin');
Route::group(['middleware' => ['auth']], function () {
		Route::group(['middleware' => ['admin']], function () {
			Route::get('/smartphone', 'AdminSmartphoneCRUD@index')->name('adm_smartphone');
			Route::get('/account/setting/change_password', 'UserSettingsController@change_pwd')
			->name('user_change_pwd');
			Route::post('/account/setting/update_password', 'UserSettingsController@update_pwd')
			->name('user_update_pwd');
		});
	});

Route::get('redirect/{driver}', 'Auth\LoginController@redirectToProvider')->name('login.provider');
Route::get('{driver}/callback', 'Auth\LoginController@handleProviderCallback')->name('login.callback');