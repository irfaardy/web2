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
Route::get('/img/smartphone/{ukuran}/{link}.jpg', 'ImagesController@showImgSmart')->name('img_smp');
Route::get('/img/article/{ukuran}/{link}.jpg', 'ImagesController@showImgArk')->name('img_ark');

Route::get('/smartphone/detail/{id}', 'SmartphoneController@detail')->name('smartphone');
Route::get('/smartphone/merk/{id}', 'SmartphoneController@merk')->name('smartphone_merk');
Route::get('/artikel/detail/{id}', 'ArtikelController@detail')->name('artikel_detail');

Route::group(['middleware' => ['auth']], function () {
		Route::group(['middleware' => ['admin']], function () {
			Route::get('/admin/dashboard', 'AdminDashboard@index')->name('dashboard_admin');
			Route::get('/admin/smartphone', 'AdminSmartphoneCRUD@index')->name('adm_phone');
			Route::get('/admin/smartphone/edit/{id}', 'AdminSmartphoneCRUD@edit')->name('adm_phone_edit');
			Route::post('/admin/smartphone/update', 'AdminSmartphoneCRUD@update')->name('adm_phone_update');
			Route::get('/admin/smartphone/detail/{id}', 'AdminSmartphoneCRUD@detail')->name('adm_phone_detail');
			Route::get('/admin/smartphone/delete/{id}', 'AdminSmartphoneCRUD@delete')->name('adm_phone_delete');
			Route::get('/admin/smartphone/create', 'AdminSmartphoneCRUD@create')->name('adm_phone_create');
			Route::post('/admin/smartphone/store', 'AdminSmartphoneCRUD@store')->name('adm_phone_store');

			Route::get('/admin/artikel', 'AdminArticleCRUD@index')->name('adm_article');
			Route::get('/admin/artikel/create', 'AdminArticleCRUD@create')->name('adm_artikel_create');
			Route::get('/admin/artikel/delete/{id}', 'AdminArticleCRUD@delete')->name('adm_artikel_hapus');
			Route::post('/admin/artikel/store', 'AdminArticleCRUD@store')->name('adm_artikel_store');
			Route::post('/admin/artikel/update', 'AdminArticleCRUD@update')->name('adm_artikel_update');
			Route::get('/admin/artikel/edit/{id}', 'AdminArticleCRUD@edit')->name('adm_artikel_edit');
			Route::get('/admin/artikel/detail/{id}', 'AdminArticleCRUD@detail')->name('adm_artikel_detail');
			Route::get('/admin/produsen', 'AdminSmartphoneProdusen@index')->name('adm_produsen');
			Route::get('/admin/produsen/{id}/edit', 'AdminSmartphoneProdusen@edit')->name('adm_edit_produsen');
			Route::get('/admin/produsen/{id}/delete', 'AdminSmartphoneProdusen@destroy')->name('adm_hapus_produsen');
			Route::get('/admin/produsen/create', 'AdminSmartphoneProdusen@create')->name('adm_produsen_create');
			Route::post('/admin/produsen/update', 'AdminSmartphoneProdusen@update')->name('adm_produsen_update');
			Route::post('/admin/produsen/store', 'AdminSmartphoneProdusen@store')->name('adm_produsen_store');

			Route::post('/image/delete','ImagesController@deleteIMG')->name('delete_image');
			Route::get('/admin/account/setting/change_password', 'UserSettingsController@adm_change_pwd')
			->name('user_change_pwd');
			Route::post('/admin/account/setting/update_password', 'UserSettingsController@adm_update_pwd')
			->name('user_update_pwd');
		});
	});

Route::get('/smartphone/merk/{id}','SmartphoneController@merk')->name('produsen_id');
Route::get('redirect/{driver}', 'Auth\LoginController@redirectToProvider')->name('login.provider');
Route::get('{driver}/callback', 'Auth\LoginController@handleProviderCallback')->name('login.callback');