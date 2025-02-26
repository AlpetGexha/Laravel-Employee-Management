<?php

namespace App\Filament\Resources;

use App\Enums\LeaveType;
use App\Enums\PTO as EnumsPTO;
use App\Filament\Resources\PTOResource\Pages;
use App\Models\PTO;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action as ActionsAction;
use Filament\Tables\Table;

class PTOResource extends Resource
{
    protected static ?string $model = PTO::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    protected static ?string $navigationGroup = 'Employee Management';

    protected static ?string $label = 'PTO';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('employee.first_name')
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
                ActionsAction::make('status')
                    ->action(fn (array $data, PTO $record) => $record->update(['is_approved' => $data['status']]))
                    ->form([
                        Select::make('status')
                            ->options([
                                'Approved' => EnumsPTO::Approved->value,
                                'Rejected' => EnumsPTO::Rejected->value,
                            ]),
                    ]),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('employee_id')
                    ->relationship('employees', 'id')
                    ->columnSpanFull()
                    ->required(),
                Forms\Components\DateTimePicker::make('from_date')
                    ->required(),
                Forms\Components\DateTimePicker::make('to_date')
                    ->required(),
                Forms\Components\Select::make('leave_type')
                    ->options(LeaveType::class)
                    ->required(),
                Forms\Components\Textarea::make('reason')
                    ->required()
                    ->columnSpanFull(),
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
