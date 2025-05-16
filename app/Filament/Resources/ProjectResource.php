<?php

namespace App\Filament\Resources;

use App\Enums\Status;
use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers\EmployeesRelationManager;
use App\Filament\Resources\ProjectResource\RelationManagers\TasksRelationManager;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\Actions\Action as InfoAction;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\Split;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-code-bracket-square';

    protected static ?string $navigationGroup = 'Project Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255),
                Forms\Components\MarkdownEditor::make('description')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('start_date')
                    ->required(),
                Forms\Components\DateTimePicker::make('end_date')
                    ->required(),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Project Overview')
                    ->icon('heroicon-o-document-text')
                    ->description('General information about the project')
                    ->schema([
                        Split::make([
                            Grid::make(2)
                                ->schema([
                                    Group::make([
                                        TextEntry::make('name')
                                            ->label('Project Name')
                                            ->weight('bold')
                                            ->size(TextEntry\TextEntrySize::Large),

                                        TextEntry::make('description')
                                            ->label('Description')
                                            ->markdown(),
                                    ]),

                                    Group::make([
                                        TextEntry::make('status')
                                            ->badge()
                                            ->color(fn (string $state): string => match ($state) {
                                                'completed' => 'success',
                                                'in progress' => 'warning',
                                                'pending' => 'info',
                                                'cancelled' => 'danger',
                                                default => 'gray',
                                            }),

                                        TextEntry::make('time_left')
                                            ->label('Time Left')
                                            ->formatStateUsing(fn ($record): string => $record->time_left < 0
                                                ? 'Overdue by ' . abs($record->time_left) . ' days'
                                                : $record->time_left . ' days')
                                            ->color(fn ($record): string => $record->time_left < 0
                                                ? 'danger'
                                                : ($record->time_left < 5 ? 'warning' : 'success')),
                                    ]),
                                ]),
                        ]),

                        Grid::make(3)
                            ->schema([
                                TextEntry::make('start_date')
                                    ->label('Start Date')
                                    ->date('F j, Y')
                                    ->icon('heroicon-o-calendar'),

                                TextEntry::make('end_date')
                                    ->label('End Date')
                                    ->date('F j, Y')
                                    ->icon('heroicon-o-calendar'),

                                TextEntry::make('employees_count')
                                    ->label('Team Size')
                                    ->state(fn ($record) => $record->employees->count())
                                    ->suffix(' members')
                                    ->icon('heroicon-o-user-group'),
                            ]),
                    ]),

                Section::make('Project Tasks')
                    ->icon('heroicon-o-clipboard-document-check')
                    ->description('Tasks associated with this project')
                    ->schema([
                        TextEntry::make('tasks_count')
                            ->label('Total Tasks')
                            ->state(fn ($record) => $record->tasks->count())
                            ->suffixAction(
                                InfoAction::make('viewTasks')
                                    ->icon('heroicon-m-arrow-top-right-on-square')
                                    ->url(fn ($record) => ProjectResource::getUrl('edit', ['record' => $record]) . '#relation-manager-tasks-relation-manager-tab')
                            ),

                        TextEntry::make('tasks_status_summary')
                            ->label('Tasks by Status')
                            ->html()
                            ->state(function ($record) {
                                $tasks = $record->tasks;
                                $statusCounts = [
                                    'pending' => 0,
                                    'in progress' => 0,
                                    'completed' => 0,
                                ];

                                foreach ($tasks as $task) {
                                    $status = strtolower($task->status ?? 'pending');
                                    if (isset($statusCounts[$status])) {
                                        $statusCounts[$status]++;
                                    }
                                }

                                $colors = [
                                    'pending' => 'bg-blue-100 text-blue-800',
                                    'in progress' => 'bg-yellow-100 text-yellow-800',
                                    'completed' => 'bg-green-100 text-green-800',
                                ];

                                $html = '<div class="flex flex-wrap gap-2">';

                                foreach ($statusCounts as $status => $count) {
                                    $color = $colors[$status] ?? 'bg-gray-100 text-gray-800';
                                    $html .= "<span class=\"px-2 py-1 rounded-lg text-xs font-medium {$color}\">{$count} " . ucwords($status) . '</span>';
                                }

                                $html .= '</div>';

                                return new HtmlString($html);
                            }),
                    ]),

                Section::make('Task List')
                    ->description('All tasks in this project')
                    ->collapsible()
                    ->schema([
                        TextEntry::make('tasks')
                            ->label('')
                            ->html()
                            ->state(function ($record) {
                                // No foreach needed as requested
                                $html = '<ul class="list-disc ml-4 space-y-1">';

                                foreach ($record->tasks as $task) {
                                    $statusColor = match (strtolower($task->status ?? 'pending')) {
                                        'completed' => 'text-green-600',
                                        'in progress' => 'text-amber-600',
                                        'pending' => 'text-blue-600',
                                        default => 'text-gray-600',
                                    };

                                    $priorityIcon = match (strtolower($task->priority ?? 'medium')) {
                                        'high' => '🔴',
                                        'medium' => '🟠',
                                        'low' => '🟢',
                                        default => '⚪',
                                    };

                                    $html .= "<li><strong>{$task->name}</strong> " .
                                        "<span class=\"text-xs font-medium {$statusColor} border border-current rounded px-1.5 py-0.5 ml-1\">{$task->status}</span> " .
                                        "<span class=\"text-xs\">{$priorityIcon} {$task->priority}</span></li>";
                                }

                                $html .= '</ul>';

                                return new HtmlString($html);
                            }),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn ($query) => $query->withCount('employees', 'tasks'))
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('time_left')
                    ->formatStateUsing(fn ($record): string => $record->time_left < 0 ? 'Overdue' : $record->time_left . ' days')
                    ->badge()
                    ->color(function ($record): string {
                        if ($record->time_left < 0) {
                            return 'gray';
                        }
                        if ($record->time_left < 5) {
                            return 'warning';
                        } else {
                            return 'primary';
                        }
                    })
                    ->label('Time Left'),
                Tables\Columns\TextColumn::make('status')
                    ->badge(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('employees_count')
                    ->label('Employees')
                    ->sortable(),
                Tables\Columns\TextColumn::make('tasks_count')
                    ->label('Tasks')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('status')
                    ->label('Status')
                    ->fillForm(fn ($record): array => [
                        'status' => $record->status,
                    ])
                    ->form([
                        Forms\Components\Select::make('status')
                            ->options(Status::class),
                    ])
                    ->action(function (array $data, $record): void {
                        $record->status = $data['status'];
                        $record->save();
                    }),
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
            TasksRelationManager::class,
            EmployeesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'view' => Pages\ViewProject::route('/{record}'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
