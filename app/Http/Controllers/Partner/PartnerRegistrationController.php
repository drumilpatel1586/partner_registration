<?php

namespace App\Http\Controllers\partner;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Partner\Partner;

class PartnerRegistrationController extends Controller
{
    public function formValidation(Request $request)
    {
        $request->validate([
            'company_name' => 'required|max:20',
            'address' => 'required',
            'select_country' => 'required',
            'select_state' => 'required',
            'select_city' => 'required',
            'zip' => 'required|numeric|digits:6',
            'website' => 'required|url|max:255',
            'landline' => 'required|numeric|digits:10',
            'first_name' => 'required|max:30',
            'last_name' => 'required|max:30',
            'job_title' => 'required|max:20',
            'mobile' => 'required|numeric|digits:10',
            'personal_landline' => 'required|numeric|digits:10',
            'mail' => 'required|email|max:255',
            'captcha' => 'required|captcha'
        ]);

        Partner::create([
            'company_name' => $request->company_name,
            'company_address' => $request->address,
           'select_country' => $request->select_country,
           'select_state' => $request->select_state,
           'select_city' => $request->select_city,
            'company_zip_code' => $request->zip,
            'company_website' => $request->website,
            'company_landline' => $request->landline,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'job_title' => $request->job_title,
           'mobile' => $request->mobile,
            'landline' => $request->personal_landline,
           'email' => $request->mail
        ]);

        return redirect('/')->with('success', 'Registration Successfully, Please verify your mail address, we have sent you a mail notification on your registered mail account.');

    }
}
