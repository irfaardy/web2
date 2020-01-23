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


Route::group(['middleware' => ['auth']], function () {
		Route::group(['middleware' => ['admin']], function () {
			Route::get('/admin/dashboard', 'AdminDashboard@index')->name('dashboard_admin');
			Route::get('/admin/smartphone', 'AdminSmartphoneCRUD@index')->name('adm_phone');
			Route::get('/admin/smartphone/create', 'AdminSmartphoneCRUD@create')->name('adm_phone_create');
			Route::get('/admin/smartphone/store', 'AdminSmartphoneCRUD@store')->name('adm_phone_store');

			Route::get('/admin/produsen', 'AdminSmartphoneProdusen@index')->name('adm_produsen');
			Route::get('/admin/produsen/{id}/edit', 'AdminSmartphoneProdusen@edit')->name('adm_edit_produsen');
			Route::get('/admin/produsen/{id}/delete', 'AdminSmartphoneProdusen@destroy')->name('adm_hapus_produsen');
			Route::get('/admin/produsen/create', 'AdminSmartphoneProdusen@create')->name('adm_produsen_create');
			Route::post('/admin/produsen/update', 'AdminSmartphoneProdusen@update')->name('adm_produsen_update');
			Route::post('/admin/produsen/store', 'AdminSmartphoneProdusen@store')->name('adm_produsen_store');

			Route::get('/admin/account/setting/change_password', 'UserSettingsController@adm_change_pwd')
			->name('user_change_pwd');
			Route::post('/admin/account/setting/update_password', 'UserSettingsController@adm_update_pwd')
			->name('user_update_pwd');
		});
	});

Route::get('/smartphone/produsen/{id}','SmartphoneController@produsen')->name('produsen_id');
Route::get('redirect/{driver}', 'Auth\LoginController@redirectToProvider')->name('login.provider');
Route::get('{driver}/callback', 'Auth\LoginController@handleProviderCallback')->name('login.callback');