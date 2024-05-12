<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class SendVerificationEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $formData;
    protected $supportedMail;
    protected $supportedPhone;

    public function __construct($formData, $supportedMail, $supportedPhone)
    {
        $this->formData = $formData;
        $this->supportedMail = $supportedMail;
        $this->supportedPhone = $supportedPhone;
    }

    public function handle()
    {
        try {
            // Initialize PHPMailer
            $mail = new PHPMailer(true);

            // Configure PHPMailer
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'noblecausesamd@gmail.com';
            $mail->Password = 'orwc htbg ydcq ecke';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Set email parameters
            $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            $mail->addAddress($this->formData['mail'], $this->formData['first_name']);
            $mail->isHTML(true);
            $mail->Subject = 'Account Verification Required - Please Confirm Your Email Address';
            $mail->Body = "Dear {$this->formData['first_name']} {$this->formData['last_name']},<br><br>" .
                "<p>Thank you for registering with Quantum Network. To ensure the security and integrity of your account, we kindly request that you verify your email address.</p>" .
                "<p>Please click on the following link to verify your email:</p>" .
                "<p><a href='" . route('verified_email') . "'>Verify Email</a></p>" .
                "<p>By verifying your email address, you will gain full access to your account and enjoy all the benefits and features offered by Quantum Network.</p>" .
                "<p>If you did not create an account with Quantum Network, please ignore this email. Your security is important to us, and we apologize for any inconvenience caused.</p>" .
                "<p>If you have any questions or need assistance, please feel free to contact our support team at <a href='{$this->supportedMail}'>{$this->supportedMail}</a> or <a href='tel:{$this->supportedPhone}'>{$this->supportedPhone}</a>.</p>" .
                "<p>Thank you for choosing Quantum Network. We look forward to serving you.</p>" .
                "<p>Best regards,<br>Quantum Network</p>";

            // Send email
            $mail->send();
        } catch (Exception $e) {
            // Log any exceptions that occur during email sending
            logger()->error("Error sending verification email: {$e->getMessage()}");
        }
    }
}
