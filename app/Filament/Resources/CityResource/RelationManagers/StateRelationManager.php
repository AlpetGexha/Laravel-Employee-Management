<?php

namespace App\Filament\Resources\CityResource\RelationManagers;

use App\Models\Country;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\Column;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StateRelationManager extends RelationManager
{
    protected static string $relationship = 'state';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('country_id')
                    ->options(fn () => Country::select('id', 'name')->pluck('name', 'id'))
                    ->label('Country Name')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->unique()
                    ->maxLength(255),
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
                Tables\Columns\TextColumn::make('country.name'),
                Tables\Columns\TextColumn::make('name')->searchable(),
            ])
            ->filters([
                SelectFilter::make('country_id')
                    ->label('Contry')
                    ->options(fn () => Country::orderByDesc('id')->notDublicate()->pluck('contry_code'))
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
