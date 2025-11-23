<?php

namespace App\Filament\Resources\Productions\Resources\Blocks;

use App\Filament\Resources\Productions\ProductionResource;
use App\Filament\Resources\Productions\Resources\Blocks\Pages\CreateBlock;
use App\Filament\Resources\Productions\Resources\Blocks\Pages\EditBlock;
use App\Filament\Resources\Productions\Resources\Blocks\Pages\ManageWorks;
use App\Filament\Resources\Productions\Resources\Blocks\Schemas\BlockForm;
use App\Filament\Resources\Productions\Resources\Blocks\Tables\BlocksTable;
use App\Models\Block;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class BlockResource extends Resource
{
    protected static ?string $model = Block::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $modelLabel = 'bloco';

    protected static ?string $pluralModelLabel = 'blocos';

    public static function form(Schema $schema): Schema
    {
        return BlockForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BlocksTable::configure($table);
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
            //'edit' => EditBlock::route('/{record}/edit'),
            'works' => ManageWorks::route('/{record}/edit') 
        ];
    }

    public static function getIndexUrl(array $parameters = [], bool $isAbsolute = true, ?string $panel = null, ?Model $tenant = null, bool $shouldGuessMissingParameters = false): string
    {
        return '/';
    }
}
