<div>
    <div class="ud-contact-form" id="contact-form">
        <form wire:submit.prevent="submit">
            @if($success)
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
                    <p class="font-bold">Success!</p>
                    <p>Your message has been sent successfully. We'll get back to you soon.</p>
                </div>
            @endif
            
            @if($error)
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
                    <p class="font-bold">Error!</p>
                    <p>{{ $error }}</p>
                </div>
            @endif
            
            @if(isset($remainingAttempts) && $remainingAttempts < $attempts)
                <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-4" role="alert">
                    <p>You have {{ $remainingAttempts }} contact attempt(s) remaining this hour.</p>
                </div>
            @endif
            
            <div class="ud-form-group">
                <label for="fullName">Full Name*</label>
                <input 
                    type="text" 
                    wire:model="name" 
                    placeholder="Adam Gelius" 
                />
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            
            <div class="ud-form-group">
                <label for="email">Email*</label>
                <input 
                    type="email" 
                    wire:model="email" 
                    placeholder="example@yourmail.com" 
                />
                @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            
            <div class="ud-form-group">
                <label for="phone">Phone*</label>
                <input 
                    type="text" 
                    wire:model="phone" 
                    placeholder="+885 1254 5211 552" 
                />
                @error('phone') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            
            <div class="ud-form-group">
                <label for="message">Message*</label>
                <textarea 
                    wire:model="message" 
                    rows="4" 
                    placeholder="Type your message here"
                ></textarea>
                @error('message') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            
            <div class="ud-form-group mb-0">
                <button 
                    type="submit" 
                    class="ud-main-btn"
                    wire:loading.attr="disabled"
                >
                    <span wire:loading.remove>Send Message</span>
                    <span wire:loading>Sending...</span>
                </button>
            </div>
        </form>
    </div>
</div>
