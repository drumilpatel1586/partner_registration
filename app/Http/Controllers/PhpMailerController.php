<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use App\Jobs\SendVerificationEmailJob;

class PhpMailerController extends Controller
{
    public function supportedthings()
    {
        $supported_mail = 'drumilpatel1586@gmail.com';
        $supported_phone = 18001231163;
        return [
            "supported_mail" => $supported_mail,
            "supported_phone" => $supported_phone
        ];
    }
    public function verficationmailsenderToPartner(Request $request)
    {   
        try {
            // Get supported mail and phone
            $supported = $this->supportedthings();
            $supportedMail = $supported['supported_mail'];
            $supportedPhone = $supported['supported_phone'];

            // Dispatch a job to send the email in the background
            SendVerificationEmailJob::dispatch($request->all(), $supportedMail, $supportedPhone);

            // Redirect the user to another page
            return redirect('/')->with('success','Partner Successfully Registered, For Security reasons please verify your email address, We have sent you a verification email on registered email address.');
            
        } catch (Exception $e) {
            // Handle any exceptions that may occur
            return redirect('/')->with('error', 'Failed to send verification email');
        }
    }
}
