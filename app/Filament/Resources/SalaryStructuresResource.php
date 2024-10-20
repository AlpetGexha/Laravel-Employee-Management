<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SalaryStructuresResource\Pages;
use App\Models\SalaryStructures;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SalaryStructuresResource extends Resource
{
    protected static ?string $model = SalaryStructures::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Employee Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('company_id')
                    ->relationship('company', 'name')
                    ->required(),
                Forms\Components\TextInput::make('salary_class')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('basic_salary')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('mobile_allowance')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('medical_expenses')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('houseRent_allowance')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('total_salary')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('salary_class')
                    ->searchable(),
                Tables\Columns\TextColumn::make('basic_salary')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mobile_allowance')
                    ->searchable(),
                Tables\Columns\TextColumn::make('medical_expenses')
                    ->searchable(),
                Tables\Columns\TextColumn::make('houseRent_allowance')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total_salary')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListSalaryStructures::route('/'),
            'create' => Pages\CreateSalaryStructures::route('/create'),
            'edit' => Pages\EditSalaryStructures::route('/{record}/edit'),
        ];
    }
}
