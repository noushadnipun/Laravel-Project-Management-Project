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
    return view('frontend.login');
});

// Route::get('/login', function () {
//     return view('frontend.login');
// });

Route::get('/admin/login', function () {
    return view('auth.login');
})->name('admin.login');

Route::group(['middleware' => 'auth'], function() {

include_once 'admin.php';

});



include_once 'writer.php';

//Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', function(){
return redirect()->route('admin.dashboard.index');
})->name('home');


//Override Auth Login 

Route::get('nipun/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('nipun/login', 'Auth\LoginController@login');
Route::post('nipun/logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
// if (config('nipun/register'))
// {
    Route::get('nipun/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('nipun/register', 'Auth\RegisterController@register');
// }

// Password Reset Routes...
if (config('reset'))
{
    Route::get('nipun/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('nipun/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('nipun/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('nipun/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
}
// Email Verification Routes...
if (config('verify'))
{
    Route::get('nipun/email/verify', 'Auth\VerificationController@show')->name('verification.notice');
    Route::get('nipun/email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
    Route::get('nipun/email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
}

