<?php

namespace App\Jobs;

use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendContactMailJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public Contact $contact,
    )
    {

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Send mail
        Mail::queue(new ContactMail($this->contact));
    }
}
