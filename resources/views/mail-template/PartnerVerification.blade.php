<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $subject }}</title>
</head>

<body>
    
    <p>Dear {{ $firstname }} {{ $lastname }},</p>
    <p>Thank you for registering with Quantum Network. To ensure the security and integrity of your account, we kindly
        request that you verify your email address.</p>
    <p>Please click on the following link to verify your email:</p>
    <p><a href="{{ route('verify-email', ['token' => $token]) }}">Verify Email</a></p>
    <p>By verifying your email address, you will gain full access to your account and enjoy all the benefits and
        features offered by Quantum Network.</p>
    <p>If you did not create an account with Quantum Network, please ignore this email. Your security is important to
        us, and we apologize for any inconvenience caused.</p>
    <p>If you have any questions or need assistance, please feel free to contact our support team at <a
            href="mailto:{{ $supportedMail }}">{{ $supportedMail }}</a> or <a
            href="tel:{{ $supportedPhone }}">{{ $supportedPhone }}</a>.</p>
    <p>Thank you for choosing Quantum Network. We look forward to serving you.</p>
    <p>Best regards,<br>Quantum Network</p>

</body>

</html>
