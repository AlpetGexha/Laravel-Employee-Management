<x-filament-panels::page>
    <x-filament-panels::form id="form" wire:submit.prevent="request">
        {{ $this->form }}

        @if (session()->has('success'))
            <div id="success-message" class="text-green-600 mt-4 mb-4">{{ session('success') }}</div>
        @endif

        @if ($confirmingCheckout)
            <div class="mb-4 mt-5">
                <p>{
                    { $employee->name }}, you've worked for {{ $hoursWorked }} hours and {{ $minutesWorked }} Minutes.
                    Do you want to check out?
                </p>
                <x-filament::button wire:click="confirmCheckout">{{ __('Confirm') }}</x-filament::button>
                <x-filament::button wire:click="$set('confirmingCheckout', false)">{{ __('Cancel') }}</x-filament::button>
            </div>
        @endif
    </x-filament-panels::form>
</x-filament-panels::page>
