<?php

namespace App\Mail;

use App\Models\ContactFormMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    //i have set the default mailer to smtp and mailtrap in the .env file
    //i have added the contactformmessage model as a parameter to the constructor and made it pubc, so it gets passed on to the view
    public function __construct(public ContactFormMessage $contactFormMessage)
    {   
        $this->contactFormMessage = $contactFormMessage;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: $this->contactFormMessage->email, //i have defined this in the env file to my email address
            subject: 'OSP - Contact Form Submission', 
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.contact', //this is the view that will be used to render the email
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


    //this specifies that the emails.contact view will be used to render the email
    public function build()
    {
        return $this->view('email.contact');
    }
}
