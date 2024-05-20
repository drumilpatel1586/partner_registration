<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\e_verification_mail;


class EmailController extends Controller
{
    public function EmailVerificationMail(){

        $toEmail = 'drumilpatel1586@gmail.com';
        $mailmessage = 'Mail Testing';
        $subject = 'Account Verification Required - Please Confirm Your Email Address';

        Mail::to($toEmail)->send(new e_verification_mail($mailmessage, $subject));

        return redirect('/')->with('success','Partner Successfully Registered, We have sent you a verification email on registered email address.');

    }   
}
