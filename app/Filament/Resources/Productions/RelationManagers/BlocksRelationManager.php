<?php

namespace App\Filament\Resources\Productions\RelationManagers;

use App\Filament\Resources\Blocks\Schemas\BlockForm;
use App\Filament\Resources\Productions\Resources\Blocks\BlockResource;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class BlocksRelationManager extends RelationManager
{
    protected static string $relationship = 'blocks';

    protected static ?string $relatedResource = BlockResource::class;

     public static ?string $modelLabel = 'bloco';

    public static ?string $pluralModelLabel = 'blocos';

    protected static ?string $title = 'Blocos';

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make()
                    ->schema([
                        TextInput::make('name')
                            ->label('Nome')
                            ->datalist([
                                'Ficha Técnica',
                                'Elenco',
                                'Canções', 
                                'Adicionais'
                            ])
                            ->autocomplete(false)
                            ->required()
                    ])
            ]);
    }
}
