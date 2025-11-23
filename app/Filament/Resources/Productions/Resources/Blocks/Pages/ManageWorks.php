<?php

namespace App\Filament\Resources\Productions\Resources\Blocks\Pages;

use App\Filament\Resources\Productions\Resources\Blocks\BlockResource;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Resources\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;

class ManageWorks extends Page
{
    use InteractsWithRecord;

    protected static string $resource = BlockResource::class;

    protected string $view = 'filament.resources.productions.resources.blocks.pages.manage-works';

    public function mount(int|string $record): void
    {
        $this->record = $this->resolveRecord($record);
    }

    public function getTitle(): string|Htmlable
    {
        return "{$this->record->name} de {$this->record->production->title}";
    }

    public function getBreadcrumbs(): array
    {
        return [
            route('filament.admin.resources.productions.edit', ['record' => $this->record->production]) => $this->record->production->title,
            route('filament.admin.resources.productions.edit', ['record' => $this->record->production, 'relation' => 0]) => 'Blocos',
            $this->record->name
        ];
    }
}
