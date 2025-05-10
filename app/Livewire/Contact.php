<?php

namespace App\Livewire;

use App\Actions\CreateContactAction;
use App\Http\Requests\CreateContactRequest;
use App\Models\Contact as ContactModel;
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
    
    protected function rules()
    {
        return (new CreateContactRequest())->rules();
    }
    
    public function submit()
    {
        // Check rate limiting (3 contacts per hour)
        $key = 'contact_' . request()->ip();
        
        if (RateLimiter::tooManyAttempts($key, $this->attempts)) {
            $seconds = RateLimiter::availableIn($key);
            $this->error = "Too many contact attempts. Please try again in " . 
                           ceil($seconds / 60) . " minutes.";
            return;
        }
        
        // Validate the form
        $validated = $this->validate();
        
        try {
            // Use CreateContactAction to create the contact
            $createContactAction = new CreateContactAction();
            
            // Create a request object with the validated data
            $request = new CreateContactRequest();
            $request->replace([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'message' => $this->message,
            ]);
            
            // Handle contact creation and email dispatch through the action
            $createContactAction->handle($request);
            
            // Increment the rate limiter
            RateLimiter::hit($key, 3600); // 1 hour expiry
            
            // Reset form and show success message
            $this->reset(['name', 'email', 'phone', 'message']);
            $this->success = true;
            $this->error = '';
        } catch (\Exception $e) {
            $this->error = 'Failed to send your message. Please try again.';
        }
    }
    
    public function render()
    {
        // Get remaining attempts
        $key = 'contact_' . request()->ip();
        $remainingAttempts = RateLimiter::remaining($key, $this->attempts);
        
        return view('livewire.contact', [
            'remainingAttempts' => $remainingAttempts
        ]);
    }
}
