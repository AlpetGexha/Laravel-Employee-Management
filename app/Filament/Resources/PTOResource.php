<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PTOResource\Pages;
use App\Models\PTO;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PTOResource extends Resource
{
    protected static ?string $model = PTO::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Employee Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('company_id')
                    ->relationship('company', 'name')
                    ->required(),
                Forms\Components\Select::make('employee_id')
                    ->relationship('employee', 'id')
                    ->required(),
                Forms\Components\DateTimePicker::make('from_date')
                    ->required(),
                Forms\Components\DateTimePicker::make('to_date')
                    ->required(),
                Forms\Components\TextInput::make('days')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('leave_type')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('reason')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('is_approved')
                    ->required()
                    ->maxLength(255)
                    ->default('Pending'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('employee.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('from_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('to_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('days')
                    ->searchable(),
                Tables\Columns\TextColumn::make('leave_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('reason')
                    ->searchable(),
                Tables\Columns\TextColumn::make('is_approved')
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
            'index' => Pages\ListPTOS::route('/'),
            'create' => Pages\CreatePTO::route('/create'),
            'edit' => Pages\EditPTO::route('/{record}/edit'),
        ];
    }
}
