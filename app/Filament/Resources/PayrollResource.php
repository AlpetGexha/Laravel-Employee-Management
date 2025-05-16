<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PayrollResource\Pages;
use App\Models\Payroll;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PayrollResource extends Resource
{
    protected static ?string $model = Payroll::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $navigationGroup = 'Employee Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Employee & Salary Section
                Forms\Components\Section::make('Employee & Salary Information')
                    ->description('Select employee and salary structure')
                    ->icon('heroicon-o-user')
                    ->collapsible()
                    ->schema([
                        Forms\Components\Grid::make()
                            ->columns(2)
                            ->schema([
                                Forms\Components\Select::make('employee_id')
                                    ->label('Employee')
                                    ->relationship('employee', 'id')
                                    ->required(),

                                Forms\Components\Select::make('salary_structures_id')
                                    ->label('Salary Structure')
                                    ->relationship('salaryStructures', 'id')
                                    ->required(),
                            ]),
                    ]),

                // Payment Information Section
                Forms\Components\Section::make('Payment Information')
                    ->description('Enter payment details')
                    ->icon('heroicon-o-banknotes')
                    ->collapsible()
                    ->schema([
                        Forms\Components\Grid::make()
                            ->columns(2)
                            ->schema([
                                Forms\Components\TextInput::make('total_payable')
                                    ->label('Total Payable Amount')
                                    ->required()
                                    ->numeric()
                                    ->prefix('$'),

                                Forms\Components\TextInput::make('deduction')
                                    ->label('Deduction Amount')
                                    ->required()
                                    ->numeric()
                                    ->prefix('$'),
                            ]),

                        Forms\Components\TextInput::make('reason')
                            ->label('Reason for Deduction/Adjustment')
                            ->placeholder('Enter reason for deduction or adjustment if any')
                            ->maxLength(255)
                            ->default(null)
                            ->columnSpanFull(),
                    ]),

                // Payment Period Section
                Forms\Components\Section::make('Payment Period')
                    ->description('Set payment date and period')
                    ->icon('heroicon-o-calendar')
                    ->collapsible()
                    ->schema([
                        Forms\Components\Grid::make()
                            ->columns(3)
                            ->schema([
                                Forms\Components\TextInput::make('year')
                                    ->label('Year')
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\TextInput::make('month')
                                    ->label('Month')
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\DateTimePicker::make('date')
                                    ->label('Payment Date')
                                    ->required(),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Employee Information
                Tables\Columns\TextColumn::make('employee.first_name')
                    ->label('Employee')
                    ->icon('heroicon-o-user')
                    ->numeric()
                    ->sortable(),

                // Salary Structure
                Tables\Columns\TextColumn::make('salaryStructures.salary_class')
                    ->label('Salary Class')
                    ->badge()
                    ->numeric()
                    ->sortable(),

                // Financial Information
                Tables\Columns\TextColumn::make('total_payable')
                    ->label('Amount')
                    ->prefix('$')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('deduction')
                    ->label('Deduction')
                    ->prefix('$')
                    ->numeric()
                    ->sortable(),

                // Period Information
                Tables\Columns\TextColumn::make('year')
                    ->label('Year')
                    ->searchable(),

                Tables\Columns\TextColumn::make('month')
                    ->label('Month')
                    ->searchable(),

                Tables\Columns\TextColumn::make('date')
                    ->label('Payment Date')
                    ->date()
                    ->sortable(),

                // Additional Information
                Tables\Columns\TextColumn::make('reason')
                    ->label('Notes')
                    ->limit(20)
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Updated')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('employee_id')
                    ->relationship('employee', 'id')
                    ->label('Employee'),

                Tables\Filters\SelectFilter::make('year')
                    ->options([
                        '2023' => '2023',
                        '2024' => '2024',
                        '2025' => '2025',
                    ])
                    ->label('Year'),
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
            'index' => Pages\ListPayrolls::route('/'),
            'create' => Pages\CreatePayroll::route('/create'),
            'edit' => Pages\EditPayroll::route('/{record}/edit'),
        ];
    }
}
