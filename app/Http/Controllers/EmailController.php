<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\e_verification_mail;
use Illuminate\Support\Facades\DB;


class EmailController extends Controller
{
    public function EmailVerificationMail(Request $request)
    {

        $request->validate([
            'mail' => 'required|email',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            '_token' => 'required|string'
        ]);

        $toEmail = $request->input('mail');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $supportedPhone = 9106091255;
        $supportedMail = env('MAIL_USERNAME');
        $token = $request->input('_token');

        DB::table('verification_tokens')->insert([
            'token' => $token,
            'email' => $toEmail,
            'token_type' => 'EmailVerification',
            'created_at' => now(),
            'updated_at' => now()
        ]); 

        $mailmessage = 'Mail Testing';
        $subject = 'Account Verification Required - Please Confirm Your Email Address';

        Mail::to($toEmail)->send(new e_verification_mail($mailmessage, $subject, $first_name, $last_name, $supportedPhone, $supportedMail, $token));

        // echo $supportedMail;
        // echo $token;

        return redirect('/')->with('success','Partner Successfully Registered, We have sent you a verification email on registered email address.');

    }
}
