<?php

namespace App\Livewire;

use App\Actions\CreateContactAction;
use App\Http\Requests\CreateContactRequest;
use App\Jobs\SendContactMailJob;
use App\Models\Contact as ContactModel;
use Exception;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;

class Contact extends Component
{
    public $name;
    public $email;
    public $phone;
    public $message;
    public $success = false;
    public $error = '';
    public $attempts = 3;

    public function submit(CreateContactAction $action)
    {
        // Check rate limiting (3 contacts per hour)
        $key = 'contact_' . request()->ip();

        if (RateLimiter::tooManyAttempts($key, $this->attempts)) {
            $seconds = RateLimiter::availableIn($key);
            $this->error = 'Too many contact attempts. Please try again in ' .
                ceil($seconds / 60) . ' minutes.';

            return;
        }

        try {
            // Validate the input
            $this->validate();

            // Create the contact
            $contact = ContactModel::create([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'message' => $this->message,
            ]);

            SendContactMailJob::dispatch($contact);

            // Increment the rate limiter
            RateLimiter::hit($key, 3600); // 1 hour expiry

            // Reset form and show success message
            $this->reset(['name', 'email', 'phone', 'message']);
            $this->success = true;
            $this->error = '';
        } catch (Exception $e) {
            $this->error = 'Failed to send your message. Please try again.';
        }
    }

    public function render()
    {
        return view('livewire.contact');
    }

    protected function rules()
    {
        return (new CreateContactRequest)->rules();
    }
}
