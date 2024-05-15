<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\partner\Country_State_City_Controller;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Partner\CaptchaController;
use App\Http\Controllers\partner\PartnerRegistrationController;
use App\Http\Controllers\PhpMailerController;
use App\Http\Controllers\MailVerifiedController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('partner_registration', [Country_State_City_Controller::class,'renderCountriesView'])->name('partner.registration');

Route::get('states/{country_id}', [Country_State_City_Controller::class,'getstates']);
Route::get('cities/{state_id}', [Country_State_City_Controller::class,'getcities']);

Route::get('reloadCaptcha', [CaptchaController::class,'reloadCaptcha']);

Route::post('partner_registration', [PartnerRegistrationController::class,'formValidation']);

Route::get('e_verification_mail', [PhpMailerController::class,'verficationmailsenderToPartner'])->name('verification_mailsender');

Route::get('verified_email', [PartnerRegistrationController::class, 'verifiedEmail'])->name('verified_email');

// Route::get('test', [Country_State_City_Controller::class,'captcha_genrator']);

Route::prefix('admin')->group(function () {
    // Routes that belong to the admin section
    Route::get('dashboard', [AdminController::class,'dashboard']);
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
