<?php
// app/Console/Commands/SendBirthdayEmails.php

namespace App\Console\Commands;

use App\Mail\BirthdayEmail;
use App\Models\Labelprintfrom;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendBirthdayEmails extends Command
{
    protected $signature = 'emails:birthday';
    protected $description = 'Send birthday emails to users';

    public function handle()
    {
        // Get today's date
        $today = Carbon::now()->format('m-d');  // Only compare month and day
        
        // Get users whose birthdays are today
        $users = Labelprintfrom::whereRaw('DATE_FORMAT(date_of_birth, "%m-%d") = ?', [$today])->get();
        
        foreach ($users as $user) {
            // Send birthday email
            try {
                Mail::to($user->email)->send(new BirthdayEmail($user));
            } catch (\Exception $e) {
                continue;
            }
        }

        $this->info('Birthday emails sent successfully!');
    }

}
