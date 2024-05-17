<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\partner\Country_State_City_Controller;

use App\Http\Controllers\NSH\NSHController;

use App\Http\Controllers\Partner\CaptchaController;

use App\Http\Controllers\partner\PartnerRegistrationController;

use App\Http\Controllers\PhpMailerController;

use App\Http\Controllers\CountriesController;

use App\Http\Controllers\NSH\PartnerRequest;


Route::get('/', function () {
    return view('welcome');
});


Route::get('partner_registration', [Country_State_City_Controller::class, 'renderCountriesView'])->name('partner.registration');

Route::get('states/{country_id}', [Country_State_City_Controller::class, 'getstates']);
Route::get('cities/{state_id}', [Country_State_City_Controller::class, 'getcities']);

Route::get('reloadCaptcha', [CaptchaController::class, 'reloadCaptcha']);

Route::post('partner_registration', [PartnerRegistrationController::class, 'formValidation']);

Route::get('e_verification_mail', [PhpMailerController::class, 'verficationmailsenderToPartner'])->name('verification_mailsender');

Route::get('/verify-email/{token}', [PartnerRegistrationController::class, 'verifiedEmail'])->name('verify_email');


Route::prefix('nsh')->group(function () {

    Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('NSHhome');

    Route::prefix('manage')->group(function () {

        Route::get('countrymaster', [App\Http\Controllers\HomeController::class, 'countrymaster'])->name('countrymaster');

        Route::get('country/{id}', [CountriesController::class, 'CountryManage'])->name('CountryManage');

        Route::get('partner/request', [PartnerRequest::class, 'PartnerRequest'])->name('PartnerRequest');
    });
});

Auth::routes();
