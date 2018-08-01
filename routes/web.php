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

Route::get('/', [
    'as' => 'root',
    'uses' => 'WelcomeController@index',  /* WelcomeController@index */
]);

Route::get('/home', [
    'as' => 'home',
    'uses' => 'BookingsController@index',
]);


/* 코멘트(댓글) */
Route::resource('comments', 'CommentsController', ['only' => ['update', 'destroy']]);
Route::resource('bookings.comments', 'CommentsController', ['only' => 'store']);


/* 사용자 등록 */
Route::get('auth/register', [
    'as' => 'users.create',
    'uses' => 'UsersController@create',
]);
Route::post('auth/register', [
    'as' => 'users.store',
    'uses' => 'UsersController@store',
]);
Route::get('auth/confirm/{code}', [
    'as' => 'users.confirm',
    'uses' => 'UsersController@confirm',
])->where('code', '[\pL-\pN]{60}');

Route::get('/login', function () {
    return redirect(route('sessions.create'));
});


Route::get('auth/login', [
    'as' => 'sessions.create',
    'uses' => 'SessionsController@create',
]);
Route::post('auth/login', [
    'as' => 'sessions.store',
    'uses' => 'SessionsController@store',
]);
Route::get('auth/logout', [
    'as' => 'sessions.destroy',
    'uses' => 'SessionsController@destroy',
]);

Route::get('social/{provider}', [
    'as' => 'social.login',
    'uses' => 'SocialController@execute',
]);


Route::get('auth/remind', [
    'as' => 'remind.create',
    'uses' => 'PasswordsController@getRemind',
]);
Route::post('auth/remind', [
    'as' => 'remind.store',
    'uses' => 'PasswordsController@postRemind',
]);
Route::get('auth/reset/{token}', [
    'as' => 'reset.create',
    'uses' => 'PasswordsController@getReset',
]);
Route::post('auth/reset', [
    'as' => 'reset.store',
    'uses' => 'PasswordsController@postReset',
]);

Route::get('/searchbydate', [
    'as' => 'bookings.searchbydate',
    'uses' => 'searchbydate@BookinsController',
]);
/* 비밀번호 초기화

*/

Route::resource('articles', 'ArticlesController');
Route::resource('bookings', 'BookingsController');
Route::resource('suppliers', 'SuppliersController');


Route::get('/emails', [
    'as' => 'emails.index',
    'uses' => 'BookingsController@index_email',
]);

Route::get('/emailtosupplier/{id}', [
    'as' => 'bookings.emailtosupplier',
    'uses' => 'BookingsController@emailtosupplier',
]);

Route::get('/supplier_query/{id}', [
    'as' => 'supplier.supplier_query',
    'uses' => 'SuppliersController@supplier_query',
]);
