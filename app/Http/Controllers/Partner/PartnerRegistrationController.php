<?php

namespace App\Http\Controllers\partner;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Partner\Partner;
use Illuminate\Support\Facades\Redirect;
use App\Rules\ActiveUrl;

class PartnerRegistrationController extends Controller
{
    public function formValidation(Request $request)
    {
        // Check if partner with the provided email already exists
        $existingPartner = Partner::where('email', $request->input('mail'))->first();

        if ($existingPartner) {
            // Return a message indicating that the partner already exists
            return redirect('/')->with('error', 'Partner with this email already exists.');
        }

        $website = $request->input('website');
        if (!preg_match('/^https?:\/\//', $website)) {
            $website = 'http://' . $website;
            $request->merge(['website' => $website]);
        }

        $request->validate([
            'company_name' => 'required|max:30|regex:/^[a-zA-Z\s.]+$/',
            'address' => 'required|max:255|regex:/^[a-zA-Z0-9\s,.\'\/\-]+$/',
            'select_country' => 'required',
            'select_state' => 'required',
            'select_city' => 'required',
            'zip' => 'required|numeric|digits:6',
            'website' => ['required', 'url', 'max:255', new ActiveUrl],
            'landline' => 'required|numeric',
            'first_name' => 'required|max:30|regex:/^[a-zA-Z]+$/',
            'last_name' => 'required|max:30|regex:/^[a-zA-Z]+$/',
            'job_title' => 'required|max:20|regex:/^[a-zA-Z\s]+$/',
            'mobile' => 'required|numeric|digits:10',
            'personal_landline' => 'required|numeric',
            'mail' => 'required|email|max:255',
            'captcha' => 'required|captcha'
        ], [
            'company_name.regex' => 'The company name must only contain letters with spaces without special characters and symbols.',
            'first_name.regex' => 'The first name must only contain letters without spaces and special characters.',
            'last_name.regex' => 'The last name must only contain letters without spaces and special characters.',
            'address.regex' => 'The address can only contain letters, numbers, spaces, commas, periods, apostrophes, slashes, and hyphens.',
            'captcha.captcha' => 'Please enter a valid captcha number'
        ]);

        Partner::create([
            'company_name' => $request->company_name,
            'company_address' => $request->address,
            'company_country' => $request->select_country,
            'company_state' => $request->select_state,
            'company_city' => $request->select_city,
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

        $request = http_build_query($request->all());
        return Redirect::to("/emailverification?$request");
    }

    // changing status as email verified

    public function verifiedEmail(Request $request, $token)
    {
        // Retrieve the user based on the verification token
        $verification = DB::table('verification_tokens')->where([
            'token' => $token,
            'status' => 0
        ])->first();

        if ($verification) {
            // Update the email_verified field to 1 for the user
            Partner::where('email', $verification->email)->update(['email_verified' => 1]);

            DB::table('verification_tokens')
                ->where('token', $token)
                ->update([
                    'updated_at' => now(),
                    'status' => 1
                ]);

                return redirect('/')->with('success', 'Email verified successfully!');
            } else {
            return redirect('/')->with('error', 'Invalid verification token.');
        }
    }
}
