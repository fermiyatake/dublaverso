<?php

namespace App\Filament\Resources\Productions\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProductionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(null)
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('title')
                                    ->label('Título')
                                    ->required(),
                            ]),
                        Grid::make(2)
                            ->schema([
                                Select::make('production_type_id')
                                    ->relationship('productionType', 'name')
                                    ->label('Tipo de Produção')
                                    ->required()
                                    ->createOptionForm([
                                        TextInput::make('name')
                                            ->label('Nome')
                                            ->required()
                                    ]),
                                DatePicker::make('release_date')
                                    ->label('Data de Lançamento')
                                    ->required(),
                            ]),
                        Grid::make(2)
                            ->schema([
                                Select::make('genres')
                                    ->relationship('genres', 'name')
                                    ->label('Gêneros')
                                    ->searchable()
                                    ->multiple()
                                    ->required()
                                    ->createOptionForm([
                                        TextInput::make('name')
                                            ->label('Nome')
                                            ->required()
                                    ]),
                                Select::make('interests')
                                    ->relationship('interests', 'name')
                                    ->label('Interesses')
                                    ->searchable()
                                    ->multiple()
                                    ->createOptionForm([
                                        TextInput::make('name')
                                            ->label('Nome')
                                            ->required()
                                    ]),
                            ]),
                        Textarea::make('synopsis')
                            ->label('Sinopse')
                            ->columnSpanFull(),
                        FileUpload::make('cover_image')
                            ->label('Capa')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios(['2:3'])
                            ->imageCropAspectRatio('2:3')
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull()
            ]);
    }
}
