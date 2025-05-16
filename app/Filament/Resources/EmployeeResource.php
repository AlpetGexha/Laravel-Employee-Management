<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Employee Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Personal Information Section
                Forms\Components\Section::make('Personal Information')
                    ->description('Enter the employee\'s personal details')
                    ->icon('heroicon-o-user')
                    ->collapsible()
                    ->schema([
                        Forms\Components\Grid::make()
                            ->columns(2)
                            ->schema([
                                Forms\Components\TextInput::make('first_name')
                                    ->label('First Name')
                                    ->required()
                                    ->maxLength(255)
                                    ->placeholder('John'),

                                Forms\Components\TextInput::make('last_name')
                                    ->label('Last Name')
                                    ->required()
                                    ->maxLength(255)
                                    ->placeholder('Doe'),
                            ]),

                        Forms\Components\Grid::make()
                            ->columns(2)
                            ->schema([
                                Forms\Components\TextInput::make('email')
                                    ->label('Email Address')
                                    ->email()
                                    ->required()
                                    ->maxLength(255)
                                    ->placeholder('john.doe@example.com'),

                                Forms\Components\TextInput::make('phone')
                                    ->label('Phone Number')
                                    ->tel()
                                    ->required()
                                    ->maxLength(255)
                                    ->placeholder('+1 (555) 123-4567'),
                            ]),

                        Forms\Components\Grid::make()
                            ->columns(2)
                            ->schema([
                                Forms\Components\DateTimePicker::make('date_birth')
                                    ->label('Date of Birth')
                                    ->displayFormat('F j, Y')
                                    ->placeholder('Select date of birth'),

                                Forms\Components\TextInput::make('personal_number')
                                    ->label('ID/Passport Number')
                                    ->required()
                                    ->maxLength(255)
                                    ->placeholder('A1234567B'),
                            ]),
                    ]),

                // Address Information Section
                Forms\Components\Section::make('Address Information')
                    ->description('Enter the employee\'s location details')
                    ->icon('heroicon-o-map-pin')
                    ->collapsible()
                    ->schema([
                        Forms\Components\Textarea::make('address')
                            ->label('Street Address')
                            ->required()
                            ->rows(2)
                            ->placeholder('123 Main St, Apt 4B'),

                        Forms\Components\Grid::make()
                            ->columns(3)
                            ->schema([
                                Forms\Components\Select::make('countries_id')
                                    ->label('Country')
                                    ->relationship('countries', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->reactive(),

                                Forms\Components\Select::make('states_id')
                                    ->label('State/Province')
                                    ->relationship('states', 'name', function ($query, $get) {
                                        $countryId = $get('countries_id');
                                        if (!$countryId) {
                                            return $query->whereNull('id');
                                        }
                                        return $query->where('countries_id', $countryId);
                                    })
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->reactive(),

                                Forms\Components\Select::make('cities_id')
                                    ->label('City')
                                    ->relationship('cities', 'name', function ($query, $get) {
                                        $stateId = $get('states_id');
                                        if (!$stateId) {
                                            return $query->whereNull('id');
                                        }
                                        return $query->where('states_id', $stateId);
                                    })
                                    ->searchable()
                                    ->preload()
                                    ->required(),
                            ]),
                    ]),

                // Employment Information Section
                Forms\Components\Section::make('Employment Details')
                    ->description('Enter job-related information')
                    ->icon('heroicon-o-briefcase')
                    ->collapsible()
                    ->schema([
                        Forms\Components\Grid::make()
                            ->columns(2)
                            ->schema([
                                Forms\Components\Select::make('departments_id')
                                    ->label('Department')
                                    ->relationship('departments', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required(),

                                Forms\Components\Select::make('designations_id')
                                    ->label('Job Title')
                                    ->relationship('designations', 'name')
                                    ->searchable()
                                    ->preload(),
                            ]),

                        Forms\Components\Select::make('salary_structures_id')
                            ->label('Salary Structure')
                            ->relationship('salaryStructures', 'id')
                            ->searchable()
                            ->preload()
                            ->placeholder('Select a salary structure'),

                        Forms\Components\Card::make()
                            ->schema([
                                Forms\Components\Grid::make()
                                    ->columns(2)
                                    ->schema([
                                        Forms\Components\DateTimePicker::make('date_hired')
                                            ->label('Hire Date')
                                            ->displayFormat('F j, Y')
                                            ->placeholder('Select hire date'),

                                        Forms\Components\DateTimePicker::make('date_fired')
                                            ->label('Termination Date (if applicable)')
                                            ->displayFormat('F j, Y')
                                            ->placeholder('Select termination date'),
                                    ]),
                            ]),
                    ]),

                // Status Information Section
                Forms\Components\Section::make('Status')
                    ->description('Set employee\'s current status')
                    ->icon('heroicon-o-check-circle')
                    ->collapsible()
                    ->schema([
                        Forms\Components\Grid::make()
                            ->columns(2)
                            ->schema([
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Active Employee')
                                    ->helperText('Toggle to set employee as active or inactive')
                                    ->required(),

                                Forms\Components\Select::make('status')
                                    ->label('Employment Status')
                                    ->options([
                                        'full-time' => 'Full-time',
                                        'part-time' => 'Part-time',
                                        'contract' => 'Contract',
                                        'probation' => 'Probation',
                                        'leave' => 'On Leave',
                                        'terminated' => 'Terminated',
                                    ])
                                    ->default('full-time'),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function ($query): void {
                $query
//                    ->join('states', 'states.id', '=', 'employees.states_id')
//                    ->join('cities', 'cities.id', '=', 'employees.cities_id')
//                    ->join('departments', 'departments.id', '=', 'employees.departments_id')
//                    ->join('designations', 'designations.id', '=', 'employees.designations_id')
//                    ->select(['employees.first_name', 'employees.last_name', 'employees.email', 'employees.phone', 'employees.personal_number', 'employees.address', 'employees.date_birth', 'employees.date_hired', 'states.name as state', 'cities.name as city', 'departments.name as department', 'designations.name as designation'])
                    ->withCount(['projects', 'ptoThisYear', 'payrolls'])
                    ->withSum('attendancesThisYear', 'total_minutes');
                //                dd($query->toSql());
            })
            ->columns([
                Tables\Columns\TextColumn::make('payrolls_count'),
                Tables\Columns\TextColumn::make('projects_count'),
                Tables\Columns\TextColumn::make('pto_this_year_count'),
                Tables\Columns\TextColumn::make('attendances_sum_total_minutes'),
                Tables\Columns\TextColumn::make('company.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('statessss')
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
                Filter::make('is_active')->toggle(),
                SelectFilter::make('departments')
                    ->multiple()
                    ->relationship('departments', 'name')
                    ->preload()
                    ->optionsLimit(20),
                SelectFilter::make('status'),

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
