<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PhpMailerController extends Controller
{
    public function supportedthings(){
        $supported_mail='drumilpatel1586@gmail.com';
        $supported_phone=18001231163;
        return [
            "supported_mail" => $supported_mail,
            "supported_phone" => $supported_phone
        ];
    }
    public function verficationmailsenderToPartner(Request $request)
    {

        $supported = $this->supportedthings();
        $supported_mail = $supported['supported_mail'];
        $supported_phone = $supported['supported_phone'];

        require base_path('vendor/autoload.php');
        $mail = new Phpmailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'noblecausesamd@gmail.com';
            $mail->Password   = 'orwc htbg ydcq ecke';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            $mail->addAddress($request->mail, $request->first_name);

            $mail->isHTML(true);
            $mail->Subject = 'Account Verification Required - Please Confirm Your Email Address';
            $mail->Body = "Dear $request->first_name $request->last_name,
            <br>

            <p>Thank you for registering with Quantum Network. To ensure the security and integrity of your account, we kindly request that you verify your email address.</p>
    
            <p>Please click on the following link to verify your email:</p>
            
            <p><a href='" . route('verified_email')  . "'>Verify Email</a></p>
            
            <p>By verifying your email address, you will gain full access to your account and enjoy all the benefits and features offered by Quantum Network.</p>
            
            <p>If you did not create an account with Quantum Network, please ignore this email. Your security is important to us, and we apologize for any inconvenience caused.</p>
            
            <p>If you have any questions or need assistance, please feel free to contact our support team at <a href=$supported_mail> $supported_mail </a> or <a href='tel:$supported_phone'>$supported_phone</a>.</p>
            
            <p>Thank you for choosing Quantum Network. We look forward to serving you.</p>
            
            <p>Best regards,<br>Quantum Network</p>";

            if (!$mail->send()) {
                echo 'Mail send failed';
            } else {
                echo 'Mail sent successfully';
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
