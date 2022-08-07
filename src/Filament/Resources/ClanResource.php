<?php

namespace SquadMS\Clans\Filament\Resources;

use Filament\Forms;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use SquadMS\Clans\Filament\Resources\ClanResource\Pages;
use SquadMS\Clans\Filament\Resources\ClanResource\RelationManagers;
use SquadMS\Clans\Models\Clan;

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
                Forms\Components\Grid::make()
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->rules('required|string|min:1|max:255')
                        ->required(),
                    Forms\Components\TextInput::make('tag')
                        ->rules('required|string|min:1|max:255')
                        ->required(),
                    Forms\Components\TextInput::make('website')
                        ->type('url')
                        ->rules('url'),
                    Forms\Components\FileUpload::make('logo')
                        ->image()
                        ->disk('images')
                        ->directory('clan-logos')
                        ->visibility('public')
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable(),
                Tables\Columns\TextColumn::make('tag')->sortable(),
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ClanMembershipRelationManager::class,
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
