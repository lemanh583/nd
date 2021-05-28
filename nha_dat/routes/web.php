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
})->middleware('auth');

Route::get('/login','LogRegController@showformLogin')->name('login');
Route::post('/login','LogRegController@submitLogin')->name('submitLogin');
Route::get('/logout','LogRegController@logOut')->name('logout')->middleware('auth');
Route::get('/register','LogRegController@showformRegister')->name('showformRegister');
Route::post('/register','LogRegController@submitRegister')->name('submitRegister');

Route::group(['prefix' => 'admin', 'middleware' => ['auth','checkadmin']],function(){
    Route::get('/','UserController@showAdmin');
    Route::get('/showListUsers','UserController@showListUsers')->name('showListUsers');
    Route::get('/showListMods','UserController@showListMods')->name('showListMods');
    Route::get('/editUser/{id}','UserController@editUser')->name('editUser');
    Route::post('/updateUser','UserController@updateUser')->name('updateUser');
    Route::post('/createUser','UserController@createUser')->name('createUser');
    Route::get('/deleteUser/{id}','UserController@deleteUser')->name('deleteUser');
    Route::get('/setRole/{id}','UserController@setRole')->name('setRole');
    Route::any('/search','UserController@search')->name('search');
    // Route::get('/test','UserController@test');

    //hiên thị danh sách bài viết
    Route::get('/showlistDetail','DetailController@showlistDetail')->name('showlistDetail');
    Route::get('/viewDetail/{id}','DetailController@viewDetail')->name('viewDetail');
    Route::get('/ajax','DetailController@ajax')->name('ajax');
    Route::get('/ajaxVilages','DetailController@ajaxVilages')->name('ajaxVilages');
    Route::get('showAddDetail','DetailController@showAddDetail')->name('showAddDetail');
    Route::post('addDetail','DetailController@addDetail')->name('addDetail');
    Route::get('/editDetail/{id}','DetailController@editDetail')->name('editDetail');
    Route::post('/updateDetail','DetailController@updateDetail')->name('updateDetail');
    Route::get('/deleteDetail/{id}','DetailController@deleteDetail')->name('deleteDetail');
    Route::get('/deleteImgAjax/{id}','DetailController@deleteImgAjax')->name('deleteImgAjax');
    Route::any('/searchDetail','DetailController@searchDetail')->name('searchDetail');
    
    //Thêm các mặc định
    Route::get('showDefaultProvinces','DefaultController@showDefaultProvinces')->name('showDefaultProvinces');
    Route::post('addProvince','DefaultController@addProvince')->name('addProvince');
    Route::get('updateProvince/{id}','DefaultController@updateProvince')->name('updateProvince');
    Route::get('deleteProvince/{id}','DefaultController@deleteProvince')->name('deleteProvince');
   
    Route::get('showDefaultDistricts','DefaultController@showDefaultDistricts')->name('showDefaultDistricts');
    Route::get('showDistricts','DefaultController@showDistricts')->name('showDistricts');
    Route::get('addDistrict','DefaultController@addDistrict')->name('addDistrict');
    Route::get('updateDistrict','DefaultController@updateDistrict')->name('updateDistrict');
    Route::get('deleteDistrict','DefaultController@deleteDistrict')->name('deleteDistrict');
    
    Route::get('showDefaultVillages','DefaultController@showDefaultVillages')->name('showDefaultVillages');
    Route::get('showVillages','DefaultController@showVillages')->name('showVillages');
    Route::get('addVillages','DefaultController@addVillages')->name('addVillages');
    Route::get('updateVillages','DefaultController@updateVillages')->name('updateVillages');
    Route::get('deleteVillages','DefaultController@deleteVillages')->name('deleteVillages');
    
    Route::get('showDefaultTypes','DefaultController@showDefaultTypes')->name('showDefaultTypes');
    Route::post('addType','DefaultController@addType')->name('addType');
    Route::get('updateType/{id}','DefaultController@updateType')->name('updateType');
    Route::get('deleteType/{id}','DefaultController@deleteType')->name('deleteType');

    Route::get('showDefaultCategories','DefaultController@showDefaultCategories')->name('showDefaultCategories');
    Route::post('addCategory','DefaultController@addCategory')->name('addCategory');
    Route::get('updateCategory/{id}','DefaultController@updateCategory')->name('updateCategory');
    Route::get('deleteCategory/{id}','DefaultController@deleteCategory')->name('deleteCategory');
    
});


