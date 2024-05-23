<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class e_verification_mail extends Mailable
{
    use Queueable, SerializesModels;

    public $mailmessage;
    public $subject;
    public $firstname;
    public $lastname;
    public $supportedPhone;
    public $supportedMail;
    public $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailmessage, $subject, $firstname, $lastname, $supportedPhone, $supportedMail, $token)
    {
        $this->mailmessage = $mailmessage;
        $this->subject = $subject;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->supportedPhone = $supportedPhone;
        $this->supportedMail = $supportedMail;
        $this->token = $token;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'mail-template.PartnerVerification',
        );
    }
}
