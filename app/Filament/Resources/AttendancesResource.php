<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttendancesResource\Pages;
use App\Models\Attendances;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AttendancesResource extends Resource
{
    protected static ?string $model = Attendances::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Check In/Out';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(
                [
                    Forms\Components\Select::make('employee_id')
                        ->relationship('employee', 'id')
                        ->required(),
                    Forms\Components\DateTimePicker::make('checked_in_at')
                        ->required(),
                    Forms\Components\DateTimePicker::make('checked_out_at'),
                    Forms\Components\TextInput::make('late')
                        ->maxLength(255)
                        ->default(null),
                    Forms\Components\TextInput::make('overtime')
                        ->maxLength(255)
                        ->default(null),
                ]
            );
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('employee.first_name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('checked_in_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('checked_out_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('late')
                    ->searchable(),
                Tables\Columns\TextColumn::make('overtime')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total_minutes')
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
            'index' => Pages\ListAttendances::route('/'),
            'create' => Pages\CreateAttendances::route('/create'),
            'edit' => Pages\EditAttendances::route('/{record}/edit'),
        ];
    }
}
