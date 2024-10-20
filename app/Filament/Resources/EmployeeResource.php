<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Employee Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('company_id')
                    ->relationship('company', 'name')
                    ->required(),
                Forms\Components\Select::make('countries_id')
                    ->relationship('countries', 'name')
                    ->required(),
                Forms\Components\Select::make('states_id')
                    ->relationship('states', 'name')
                    ->required(),
                Forms\Components\Select::make('cities_id')
                    ->relationship('cities', 'name')
                    ->required(),
                Forms\Components\Select::make('departments_id')
                    ->relationship('departments', 'name')
                    ->required(),
                Forms\Components\Select::make('designations_id')
                    ->relationship('designations', 'name')
                    ->default(null),
                Forms\Components\Select::make('salary_structures_id')
                    ->relationship('salaryStructures', 'id')
                    ->default(null),
                Forms\Components\TextInput::make('first_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('last_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('personal_number')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('address')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('date_birth'),
                Forms\Components\DateTimePicker::make('date_hired'),
                Forms\Components\DateTimePicker::make('date_fired'),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
                Forms\Components\TextInput::make('status')
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('countries.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('states.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cities.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('departments.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('designations.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('salaryStructures.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('first_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('personal_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_birth')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_hired')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_fired')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
}
