<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SeniorResource\Pages;
use App\Filament\Resources\SeniorResource\RelationManagers;
use App\Models\Senior;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SeniorResource extends Resource
{
    protected static ?string $model = Senior::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Senior Citizens';

    protected static ?string $modelLabel = 'Senior Citizens';

    protected static ?int $navigationSort = 2;



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 Forms\Components\Section::make('Personal Information')
                    ->description('')
                    ->schema([
                        Forms\Components\TextInput::make('osca_id')
                        ->required()
                        ->numeric(),
                    Forms\Components\TextInput::make('last_name')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('first_name')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('middle_name')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('extension')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\DatePicker::make('birthday')
                        ->required()
                        ->native(false),
                    Forms\Components\TextInput::make('age')
                        ->maxValue(100)
                        ->minValue(60)
                        ->required()
                        ->numeric(),
                    Forms\Components\Select::make('gender')
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female',
                    ])
                        ->required()
                        ->native(false),
                        
                    Forms\Components\Select::make('civil_status')
                    ->options([
                        'single' => 'Single',
                        'married' => 'Married',
                        'devorced' => 'Devorced',
                        'widowed' => 'Widowed',
                    ])
                        ->required()
                        ->native(false),

                    Forms\Components\TextInput::make('religion')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('birth_place')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Textarea::make('address')
                        ->required()
                        ->columnSpanFull(),
                        ])->columns(3),
                    Forms\Components\Section::make('Other Information')
                    ->description('')
                    ->schema([
                    Forms\Components\TextInput::make('gsis_id')
                        ->numeric()
                        ->required(),
                    Forms\Components\TextInput::make('philhealth_id')
                        ->numeric()
                        ->required(),
                    Forms\Components\Select::make('illness')
                        // ->multiple()
                        ->options([
                            'illness 1' => 'Ilness 1',
                            'illness 2' => 'Ilness 2',
                            'illness 3' => 'Ilness 3'
                        ])
                        ->required(),
                    Forms\Components\Select::make('disability')
                        // ->multiple()
                        ->options([
                        'disability 1' => 'disability 1',
                        'disability 2' => 'disability 2',
                        'disability 3' => 'disability 3'
                        ])
                        ->required(),
                    Forms\Components\Select::make('educational_attainment')
                        ->options([
                            'elementary diploma' => 'Elementary diploma',
                            'high school diploma' => 'High school diploma',
                            'associates degree' => 'Associates degree',
                            'bachelors degree' => 'Bachelors degree',
                            'masters degree' => 'Masters degree',
                            'ph.D.' => 'Ph.D.',

                        ])
                        ->required()
                        ->native(false),
                    Forms\Components\Toggle::make('is_active')
                        
                        ->required(),
                    Forms\Components\TextInput::make('registry_number')
                        ->columnSpanFull()
                        // ->hiddenOn('create')
                        ->default('none'),
                        
                    ])->columns(2)


                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('osca_id')
                    ->numeric()
                    ->sortable(),
                // Tables\Columns\TextColumn::make('full_name')
                //     ->searchable()
                //     ->sortable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('first_name')
                    ->searchable()
                    ->sortable(),
                // Tables\Columns\TextColumn::make('middle_name')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('extension')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('birthday')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('age')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gender')
                    ->searchable(),
                    Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('civil_status')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('religion')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('birth_place')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('gsis_id')
                //     ->numeric()
                //     ->sortable(),
                // Tables\Columns\TextColumn::make('philhealth_id')
                //     ->numeric()
                //     ->sortable(),
                // Tables\Columns\TextColumn::make('illness')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('disability')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('educational_attainment')
                //     ->searchable(),
                // Tables\Columns\IconColumn::make('is_active')
                //     ->boolean(),
                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // Tables\Columns\TextColumn::make('updated_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListSeniors::route('/'),
            'create' => Pages\CreateSenior::route('/create'),
            'view' => Pages\ViewSenior::route('/{record}'),
            'edit' => Pages\EditSenior::route('/{record}/edit'),
        ];
    }
}
