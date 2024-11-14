<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PolisiResource\Pages;
use App\Filament\Resources\PolisiResource\RelationManagers;
use App\Models\Polisi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PolisiResource extends Resource
{
    protected static ?string $model = Polisi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nrp'),
                Forms\Components\TextInput::make('name'),
                Forms\Components\Select::make('pangkat_id')
                    ->relationship('pangkat', 'name')
                    ->required(),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('nrp'),
            Tables\Columns\TextColumn::make('name')->searchable(),
            Tables\Columns\TextColumn::make('pangkat.name')->searchable(),
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
            'index' => Pages\ListPolisis::route('/'),
            'create' => Pages\CreatePolisi::route('/create'),
            'edit' => Pages\EditPolisi::route('/{record}/edit'),
        ];
    }
}
