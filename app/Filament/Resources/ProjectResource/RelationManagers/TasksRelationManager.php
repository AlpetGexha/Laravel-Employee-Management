<?php

namespace App\Filament\Resources\ProjectResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class TasksRelationManager extends RelationManager
{
    protected static string $relationship = 'tasks';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('employees.first_name'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('priority'),
            ])
            ->filters([

            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('assign')
                    ->label('Assign')
                    ->fillForm(fn($record): array => [
                        'employees' => $record->employee_id,
                    ])
                    ->form([
                        Forms\Components\Select::make('employees')
                            ->options(fn(RelationManager $livewire) => $livewire->getOwnerRecord()->employees->pluck('first_name', 'id'))

                    ])
                    ->action(function (array $data, $record): void {
                        $record->employee_id = $data['employees'];
                        $record->save();
                    })

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('employees')
                    ->relationship('employees', 'name')
                    ->preload()
                    ->required(),
            ]);
    }
}
