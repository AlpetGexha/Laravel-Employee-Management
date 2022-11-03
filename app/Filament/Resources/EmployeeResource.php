<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Filament\Resources\EmployeeResource\Widgets\EmployeeStatsOverview;
use App\Models\City;
use App\Models\Country;
use App\Models\Employee;
use App\Models\State;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\Column;
use Filament\Tables\Filters\Layout;
use Filament\Tables\Filters\SelectFilter;
use pxlrbt\FilamentExcel\Actions\ExportAction;
use Webbingbrasil\FilamentAdvancedFilter\Filters\DateFilter;
use Webbingbrasil\FilamentAdvancedFilter\Filters\NumberFilter;
use Webbingbrasil\FilamentAdvancedFilter\Filters\TextFilter;
use Ysfkaya\FilamentPhoneInput\PhoneInput;


class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Forms\Components\Select::make('country_id')
                            ->label('Select a Contry')
                            ->options(fn () => Country::select('id', 'name')->pluck('name', 'id'))
                            ->reactive()
                            ->afterStateUpdated(fn (callable $set) => $set('state_id', null))
                            ->required(),
                        Forms\Components\Select::make('state_id')
                            ->label('Select a State')
                            // ->relationship('state', 'name')
                            ->options(function (callable $get) {
                                $country = Country::find($get('country_id'));
                                if (!$country) {
                                    return State::all()->pluck('name', 'id');
                                }
                                return $country->states->pluck('name', 'id');
                            })
                            ->reactive()
                            ->afterStateUpdated(fn (callable $set) => $set('city_id', null))
                            ->required(),
                        Forms\Components\Select::make('departament_id')
                            ->label('Select a Departament')
                            // ->relationship('departament', 'name')
                            ->options(function (callable $get) {
                                $state = State::find($get('state_id'));
                                if (!$state) {
                                    return City::all()->pluck('name', 'id');
                                }
                                return $state->cities->pluck('name', 'id');
                            })
                            ->required()
                            ->reactive(),
                        Forms\Components\Select::make('city_id')
                            ->label('Select a City')
                            ->relationship('city', 'name')
                            ->required(),
                        Forms\Components\TextInput::make('first_name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('last_name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->unique()
                            ->required()
                            ->maxLength(255),

                        PhoneInput::make('phone'),

                        Forms\Components\TextInput::make('address')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('zip_code')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('date_birth')
                            ->minDate(now()->subYears(85))
                            ->maxDate(now())
                            ->required(),
                        Forms\Components\DatePicker::make('date_hired')
                            // higher date than date_birth

                            ->maxDate(now())
                            ->required(),
                    ])
                    ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {

        Column::configureUsing(function (Column $column): void {
            $column
                ->toggleable()
                ->sortable();
        });

        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name')->label('First Name')->searchable(),
                Tables\Columns\TextColumn::make('last_name')->label('Last Name')->searchable(),
                Tables\Columns\TextColumn::make('email')->label('Email')->searchable(),
                Tables\Columns\TextColumn::make('phone')->label('Phone')->searchable(),
                Tables\Columns\TextColumn::make('address')->label('Address'),
                Tables\Columns\TextColumn::make('country.name')->label('Country'),
                Tables\Columns\TextColumn::make('departament.name')->label('Departament'),
                Tables\Columns\TextColumn::make('city.name')->label('City'),
                Tables\Columns\TextColumn::make('state.name')->label('State'),
                Tables\Columns\TextColumn::make('zip_code')->label('Zipcode'),
                Tables\Columns\TextColumn::make('date_birth')
                    ->date(),
                Tables\Columns\TextColumn::make('date_hired')
                    ->date(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->filters([
                SelectFilter::make('country_id')
                    ->label('Country')
                    ->placeholder('Select a Contry')
                    ->relationship('country', 'name'),
                SelectFilter::make('departament_id')
                    ->label('Departament')
                    ->placeholder('Select a Departament')
                    ->relationship('departament', 'name'),
                SelectFilter::make('city_id')
                    ->label('City')
                    ->placeholder('Select a City')
                    ->relationship('city', 'name'),
                SelectFilter::make('state_id')
                    ->label('State')
                    ->placeholder('Select a State')
                    ->relationship('state', 'name'),
                SelectFilter::make('address')
                    ->options(fn () => Employee::select('address')->groupBy('address')->pluck('address')),
                TextFilter::make('first_name'),
                TextFilter::make('last_name'),
                TextFilter::make('address'),
                DateFilter::make('date_birth'),
                DateFilter::make('date_hired'),
                DateFilter::make('created_at'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

            ])
            ->bulkActions([
                // ExportAction::make('export'),
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            EmployeeStatsOverview::class,
        ];
    }
}
