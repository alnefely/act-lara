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
Route::get('/', 'HomeController@index')->name('welcome');

// Test Messgae
Route::pattern('id', '[0-9]+');





Route::group(['prefix' => 'filemanager', 'middleware'=>'authadmin:filemanager_show'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


// contact
Route::resource('/dashboard/contact','ContactController');

// rgister
Route::resource('/user/register','RegisterController');

// login and rest
Route::get('/auth', 'RegisterController@auth');
Route::post('/auth', 'RegisterController@check');
Route::get('/forget/password', 'RegisterController@forgetPassword');
Route::post('/forget/password', 'RegisterController@ResetPasword');


// Auth User
// Route::get('/auth/user', 'User\AuthUserController@login');
Route::post('/auth/user', 'User\AuthUserController@check');
Route::get('/user/logout', 'User\AuthUserController@logout');
Route::get('/user/home', 'User\AuthUserController@home');
Route::post('/user/home', 'User\AuthUserController@updatePost');
Route::get('/user/profile', 'User\AuthUserController@profile');
Route::post('/user/profile', 'User\AuthUserController@profileUpdate');

// Auth Governor
// Route::get('/auth/governor', 'governor\AuthGovernorController@login');
Route::post('/auth/governor', 'governor\AuthGovernorController@check');
Route::get('/governor/logout', 'governor\AuthGovernorController@logout');
Route::get('/governor/home', 'governor\AuthGovernorController@home');
Route::post('/governor/home', 'governor\AuthGovernorController@updateHome');
Route::get('/governor/profile', 'governor\AuthGovernorController@profile');
Route::post('/governor/profile', 'governor\AuthGovernorController@profileUpdate');


Route::post('/governor/evidences/ajax', 'governor\AuthGovernorController@EvidencesAjax');
Route::post('/governor/store/degree', 'governor\AuthGovernorController@StoreDegree');



// Route::get('/auth/admin', 'AuthAdminController@login');
Route::post('/auth/admin', 'AuthAdminController@check');
Route::get('/admin/logout', 'AuthAdminController@logout');



Route::get('/admin/home', 'AdminController@home');
Route::get('/admin/profile', 'AdminController@profile');
Route::post('/admin/profile', 'AdminController@update_profile');


// App Setting
Route::get('/admin/settings', 'SettingController@index');
Route::post('/admin/settings', 'SettingController@update');

Route::get('/admin/forget-password', 'AuthAdminController@forgetPassword');
Route::post('/admin/forget-password', 'AuthAdminController@SendPassword');

//Admins
Route::get('/admin/all/json', 'AdminController@json');
Route::get('/admin/all', 'AdminController@index');
Route::get('/admin/add-new-admin', 'AdminController@create');
Route::post('/admin/add-new-admin', 'AdminController@store');
Route::get('/admin/edit/admin/{id}', 'AdminController@edit');
Route::post('/admin/edit/admin', 'AdminController@update');
Route::post('/admin/destroy/admin', 'AdminController@destroy');


//Admin Groups
Route::get('/admin/groups/json', 'GroupController@json');
Route::get('/admin/groups', 'GroupController@index');
Route::get('/admin/create/group', 'GroupController@create');
Route::post('/admin/create/group', 'GroupController@store');
Route::get('/admin/edit/group/{id}', 'GroupController@edit');
Route::post('/admin/edit/group', 'GroupController@update');
Route::post('/admin/destroy/group', 'GroupController@destroy');



//Admin Category
Route::get('/admin/categories/json', 'CategoryController@json');
Route::get('/admin/categories', 'CategoryController@index');
Route::get('/admin/create/category', 'CategoryController@create');
Route::post('/admin/create/category', 'CategoryController@store');
Route::get('/admin/edit/category/{id}', 'CategoryController@edit');
Route::post('/admin/edit/category/{id}', 'CategoryController@update');
Route::post('/admin/destroy/category', 'CategoryController@destroy');


//Admin Standards
Route::get('/admin/standards/json', 'StandardController@json');
Route::get('/admin/standards', 'StandardController@index');
Route::get('/admin/create/standard', 'StandardController@create');
Route::post('/admin/create/standard', 'StandardController@store');
Route::get('/admin/edit/standard/{id}', 'StandardController@edit');
Route::post('/admin/edit/standard/{id}', 'StandardController@update');
Route::post('/admin/destroy/standard', 'StandardController@destroy');


//Admin Indicators
Route::get('/admin/indicators/json', 'IndicatorController@json');
Route::get('/admin/indicators', 'IndicatorController@index');
Route::get('/admin/create/indicator', 'IndicatorController@create');
Route::post('/admin/create/indicator', 'IndicatorController@store');
Route::get('/admin/edit/indicator/{id}', 'IndicatorController@edit');
Route::post('/admin/edit/indicator/{id}', 'IndicatorController@update');
Route::post('/admin/destroy/indicator', 'IndicatorController@destroy');


//Admin Evidences
Route::get('/admin/evidences/json', 'EvidenceController@json');
Route::get('/admin/evidences', 'EvidenceController@index');
Route::get('/admin/create/evidence', 'EvidenceController@create');
Route::post('/admin/create/evidence', 'EvidenceController@store');
Route::get('/admin/edit/evidence/{id}', 'EvidenceController@edit');
Route::post('/admin/edit/evidence/{id}', 'EvidenceController@update');
Route::post('/admin/destroy/evidence', 'EvidenceController@destroy');

//Admin ADDLD
Route::get('/admin/AddLD/json', 'AddLDController@json');
Route::get('/admin/AddLD', 'AddLDController@index');
Route::get('/admin/create/AddLD', 'AddLDController@create');
Route::post('/admin/create/AddLD', 'AddLDController@store');

//Admin governor
Route::get('/admin/governors/json', 'GovernorController@json');
Route::get('/admin/governors', 'GovernorController@index');
Route::get('/admin/create/governor', 'GovernorController@create');
Route::post('/admin/create/governor', 'GovernorController@store');
Route::get('/admin/edit/governor/{id}', 'GovernorController@edit');
Route::post('/admin/edit/governor/{id}', 'GovernorController@update');
Route::post('/admin/destroy/governor', 'GovernorController@destroy');

//Admin users
Route::get('/admin/users/json', 'UserController@json');
Route::get('/admin/users', 'UserController@index');
Route::get('/admin/create/user', 'UserController@create');
Route::post('/admin/create/user', 'UserController@store');
Route::get('/admin/edit/user/{id}', 'UserController@edit');
Route::post('/admin/edit/user/{id}', 'UserController@update');
Route::post('/admin/destroy/user', 'UserController@destroy');
Route::get('/admin/show/user/{id}', 'UserController@show');
Route::get('/admin/prindpdf/user/{id}', 'UserController@prindpdf');
Route::get('/admin/approve/user/{id}', 'UserController@approve');
Route::get('/admin/user/reg/{id}', 'UserController@ArbitrationForm');



//Admin Adding Documents
Route::get('/admin/adding/documents', 'AddingDocumentsController@create');
Route::post('/admin/adding/documents', 'AddingDocumentsController@store');
Route::post('/admin/get/standards/ajax', 'AddingDocumentsController@ajax');
Route::post('/admin/get/users/ajax', 'AddingDocumentsController@users');
Route::post('/admin/get/governors/ajax', 'AddingDocumentsController@Governors');