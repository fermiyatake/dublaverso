<?php

namespace App\Filament\Resources\Productions\RelationManagers;

use Filament\Actions\Action;
use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Support\Colors\Color;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BlocksRelationManager extends RelationManager
{
    protected static string $relationship = 'blocks';

    public static ?string $modelLabel = 'bloco';

    public static ?string $pluralModelLabel = 'blocos';

    protected static ?string $title = 'Blocos';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nome')
                    ->datalist([
                        'Ficha Técnica',
                        'Elenco',
                        'Canções', 
                        'Adicionais'
                    ])
                    ->autocomplete(false)
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')
                    ->label('Nome')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make()
            ])
            ->recordActions([
                Action::make('access_block')
                    ->label('Acessar')
                    ->url(fn ($record) => route('filament.admin.resources.blocks.edit', $record))
                    ->color(Color::Green)
                    ->icon('heroicon-o-arrow-right'),
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}
