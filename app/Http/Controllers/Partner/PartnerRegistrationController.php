<?php

namespace App\Http\Controllers\partner;

use App\Http\Controllers\Controller;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Partner\Partner;
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Redirect;
use App\Rules\ActiveUrl;

class PartnerRegistrationController extends Controller
{
    public function formValidation(Request $request)
    {
        // Preprocess the website URL to add http:// if missing
        $website = $request->input('website');
        if (!preg_match('/^https?:\/\//', $website)) {
            $website = 'http://' . $website;
            $request->merge(['website' => $website]);
        }

        $request->validate([
            'company_name' => 'required|max:20|regex:/^[a-zA-Z\s.]+$/',
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
        return Redirect::to("/e_verification_mail?$request");

        // require base_path('vendor/autoload.php');
        // $mail = new Phpmailer(true);

        // try {
        //     $mail->isSMTP();
        //     $mail->Host       = 'smtp.gmail.com';
        //     $mail->SMTPAuth   = true;
        //     $mail->Username   = 'noblecausesamd@gmail.com';
        //     $mail->Password   = 'orwc htbg ydcq ecke';
        //     $mail->SMTPSecure = 'tls';  // Corrected from 'tsl'
        //     $mail->Port       = 587;

        //     $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        //     $mail->addAddress($request->mail, $request->first_name);

        //     $mail->isHTML(true);
        //     $mail->Subject = 'Account Verification Required - Please Confirm Your Email Address';
        //     $mail->Body = "Dear $request->first_name $request->last_name,
        //     <br>

        //     <p>Thank you for registering with Quantum Network. To ensure the security and integrity of your account, we kindly request that you verify your email address.</p>

        //     <p>Please click on the following link to verify your email:</p>

        //     <p><a href='https://127.0.0.1:8000/verified_email'>Verify Email</a></p>

        //     <p>By verifying your email address, you will gain full access to your account and enjoy all the benefits and features offered by Quantum Network.</p>

        //     <p>If you did not create an account with Quantum Network, please ignore this email. Your security is important to us, and we apologize for any inconvenience caused.</p>

        //     <p>If you have any questions or need assistance, please feel free to contact our support team at <a href='" . env('SUPPORT_EMAIL') . "'>" . env('SUPPORT_EMAIL') . "</a> or <a href='tel:" . env('SUPPORT_PHONE') . "'>" . env('SUPPORT_PHONE') . "</a>.</p>

        //     <p>Thank you for choosing Quantum Network. We look forward to serving you.</p>

        //     <p>Best regards,<br>Quantum Network</p>";

        //     if (!$mail->send()) {
        //         echo 'Mail send failed';
        //     } else {
        //         echo 'Mail sent successfully';
        //     }
        // } catch (Exception $e) {
        //     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        // }
    }
}
