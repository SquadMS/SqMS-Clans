<?php

namespace SquadMS\Clans\Filament\Resources\ClanResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\HasManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;

class ClanMembershipRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'memberships';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\BelongsToSelect::make('user_id')
                ->relationship('user', 'name')
                ->required(),
            Forms\Components\Toggle::make('admin')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('user.avatar'),
                Tables\Columns\TextColumn::make('user.name')->sortable(),
                Tables\Columns\TextColumn::make('user.steam_id_64')->sortable(),
                Tables\Columns\BooleanColumn::make('admin')->sortable(),
            ])
            ->filters([
                //
            ]);
    }
}
