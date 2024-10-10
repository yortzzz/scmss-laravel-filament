<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GrantedBeneficiaryResource\Pages;
use App\Filament\Resources\GrantedBeneficiaryResource\RelationManagers;
use App\Models\GrantedBeneficiary;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GrantedBeneficiaryResource extends Resource
{
    protected static ?string $model = GrantedBeneficiary::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationLabel = 'List of Beneficiaries';

    protected static ?int $navigationSort = 4;



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('batch')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('payroll_id')
                    ->relationship('payroll', 'description')
                    ->required(),
                Forms\Components\Toggle::make('is_claimed')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('batch')
                    ->searchable(),
                Tables\Columns\TextColumn::make('payroll.description')
                    ->label('Description')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_claimed')
                    ->boolean(),
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
            'index' => Pages\ListGrantedBeneficiaries::route('/'),
            'create' => Pages\CreateGrantedBeneficiary::route('/create'),
            'view' => Pages\ViewGrantedBeneficiary::route('/{record}'),
            'edit' => Pages\EditGrantedBeneficiary::route('/{record}/edit'),
        ];
    }
}
