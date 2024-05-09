<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\partner\Country_State_City_Controller;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Partner\CaptchaController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('partner_registration', [Country_State_City_Controller::class,'renderCountriesView']);
Route::get('states/{country_id}', [Country_State_City_Controller::class,'getstates']);
Route::get('cities/{state_id}', [Country_State_City_Controller::class,'getcities']);
Route::get('reloadCaptcha', [CaptchaController::class,'reloadCaptcha']);

// Route::get('test', [Country_State_City_Controller::class,'captcha_genrator']);

Route::prefix('admin')->group(function () {
    // Routes that belong to the admin section
    Route::get('dashboard', [AdminController::class,'dashboard']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
