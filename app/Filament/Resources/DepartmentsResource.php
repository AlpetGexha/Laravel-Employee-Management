<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DepartmentsResource\Pages;
use App\Models\Departments;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DepartmentsResource extends Resource
{
    protected static ?string $model = Departments::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'System Management';

    protected static ?int $navigationSort = 1;


    public static function form(Form $form): Form
    {
        return $form
            ->schema(self::getForm());
    }

    public static function getForm(): array
    {
        return [
            Forms\Components\TextInput::make('department_code')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('department_code')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
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
            'index' => Pages\ListDepartments::route('/'),
            'create' => Pages\CreateDepartments::route('/create'),
            'edit' => Pages\EditDepartments::route('/{record}/edit'),
        ];
    }
}
