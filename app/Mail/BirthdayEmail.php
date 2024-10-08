<?php

// app/Mail/BirthdayEmail.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BirthdayEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user; // Pass the user data to the email
    }

    public function build()
    {
        return $this->subject('Happy Birthday!')
            ->view('email.birthday')
            ->with([
                'name' => $this->user->name,
            ]);
    }
}