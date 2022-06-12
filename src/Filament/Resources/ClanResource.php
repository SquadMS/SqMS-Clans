<?php

namespace SquadMS\Clans\Filament\Resources;

use SquadMS\Clans\Filament\Resources\ClanResource\Pages;
use SquadMS\Clans\Models\Clan;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Resources\Concerns\Translatable;

class ClanResource extends Resource
{
    use Translatable;
    
    protected static ?string $navigationGroup = 'Clans Management';

    protected static ?string $model = Clan::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->rules('required|string|min:1|max:255')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable(),
            ])
            ->filters([
                //
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
            'index' => Pages\ListClan::route('/'),
            'create' => Pages\CreateClan::route('/create'),
            'edit' => Pages\EditClan::route('/{record}/edit'),
        ];
    }
}
