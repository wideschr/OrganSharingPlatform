<?php

namespace App\Mail;

use App\Models\ContactFormMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    //i have set the default mailer to smtp and mailtrap in the .env file
    //i have added the contactformmessage model as a parameter to the constructor and made it pubc, so it gets passed on to the view
    public function __construct(public $email)
    {   
        $this->email = $email;
    }
    
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: 'OSP@gmail.com', //fictive email address
            subject: 'OSP - Reset Password', 
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.resetPassword', //this is the view that will be used to render the email
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }


    //this specifies that the view will be used to render the email
    public function build()
    {
        return $this->view('email.resetPassword');
    }
}
