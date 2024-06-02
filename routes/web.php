<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\partner\Country_State_City_Controller;
use App\Http\Controllers\NSH\NSHController;
use App\Http\Controllers\Partner\CaptchaController;
use App\Http\Controllers\partner\PartnerRegistrationController;
use App\Http\Controllers\PhpMailerController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\NSH\PartnerRequest;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\StatesController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('partner_registration', [Country_State_City_Controller::class, 'renderCountriesView'])->name('partner.registration');
Route::get('states/{country_id}', [Country_State_City_Controller::class, 'getstates']);
Route::get('cities/{state_id}', [Country_State_City_Controller::class, 'getcities']);
Route::get('reloadCaptcha', [CaptchaController::class, 'reloadCaptcha']);
Route::post('partner_registration', [PartnerRegistrationController::class, 'formValidation']);
Route::get('/verify-email/{token}', [PartnerRegistrationController::class, 'verifiedEmail'])->name('verify-email');
Route::get('/partnerapproved/{partner_id}', [PartnerRequest::class, 'partnerapproved'])->name('partnerapproved');


Route::get('emailverification', [EmailController::class,'EmailVerificationMail']);


Route::prefix('nsh')->group(function () {
    Route::get('dashboard', [HomeController::class, 'index'])->name('NSHhome');

    Route::prefix('manage')->group(function () {
        Route::get('countrymaster', [HomeController::class, 'countrymaster'])->name('countrymaster');
        Route::get('statemaster', [HomeController::class, 'statemaster'])->name('statemaster');
        Route::get('citymaster', [HomeController::class, 'citymaster'])->name('citymaster');
        Route::get('country/{id}', [CountriesController::class, 'CountryManage'])->name('CountryManage');
        Route::get('state/{id}', [StatesController::class, 'StateManage'])->name('StateManage');
        Route::get('city/{id}', [CityController::class, 'cityManage'])->name('cityManage');
        Route::get('partner/request', [PartnerRequest::class, 'PartnerRequest'])->name('PartnerRequest');
    });
});

// Auth::routes();

Route::get('login',[AuthController::class,'login'])->name('login'); 
Route::post('login_check',[AuthController::class,'login_check'])->name('login_check'); 