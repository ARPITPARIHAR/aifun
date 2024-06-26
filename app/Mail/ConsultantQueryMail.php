<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConsultantQueryMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        return $this->view('emails.consultant_query')
                    ->with([
                        'name' => $this->contact['name'],
                        'email' => $this->contact['email'],
                        'phone' => $this->contact['number'],
                        'address' => $this->contact['address'],
                        'query' => $this->contact['text'],
                    ]);
    }
}
