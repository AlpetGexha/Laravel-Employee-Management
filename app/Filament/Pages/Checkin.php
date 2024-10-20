<?php

namespace App\Filament\Pages;

use App\Models\Attendances;
use App\Models\RFID;
use App\Models\User;
use Carbon\Carbon;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Pages\Page;
use Filament\Pages\SimplePage;
use Illuminate\Support\Facades\Session;

class Checkin extends Page
{
    use InteractsWithFormActions;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.checkin';
    public string $rfidUID = '';

    public ?User $employee = null;

    public ?Attendances $attendance = null;

    public bool $confirmingCheckout = false;

    public int $hoursWorked = 0;

    public int $minutesWorked = 0;

    public function request(): void
    {
        if ($this->confirmingCheckout) {
            $this->confirmCheckout();
        } else {
            $this->checkInOut();
        }
    }

    public function confirmCheckout(): void
    {
        if ($this->attendance) {
            $this->attendance->update(['checked_out_at' => Carbon::now()]);

            Session::flash('success', "{$this->employee->name} checked out successfully after {$this->hoursWorked} hours and {$this->minutesWorked} minutes.");

            $this->reset(['rfidUID', 'employee', 'attendance', 'confirmingCheckout', 'hoursWorked', 'minutesWorked']);
        }
    }

    public function checkInOut(): void
    {
        $rfidCard = RFID::query()
            ->where('code', $this->rfidUID)
            ->first();

        if (!$rfidCard) {
            Session::flash('success', 'This RFID card is not assigned to an employee.');
            $this->reset('rfidUID');

            return;
        }

        $this->employee = $rfidCard->user;

        $this->attendance = Attendances::query()
            ->where('employee_id', $this->employee->id)
            ->whereNull('checked_out_at')
            ->first();

        if ($this->attendance) {
            $duration = Carbon::now()->diff($this->attendance->checked_in_at);
            $this->hoursWorked = $duration->h;
            $this->minutesWorked = $duration->i;
            $this->confirmingCheckout = true;
        } else {
            Attendances::create([
                'employee_id' => $this->employee->id,
                'checked_in_at' => Carbon::now(),
            ]);

            Session::flash('success', "{$this->employee->name} checked in successfully.");
            $this->reset('rfidUID');
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('rfidUID')
                    ->label('')
                    ->placeholder(trans('resources.checkInOut.input.placeholder'))
                    ->autofocus(),
            ]);
    }

}
