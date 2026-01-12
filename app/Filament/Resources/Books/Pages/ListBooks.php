<?php

namespace App\Filament\Resources\Books\Pages;

use App\Filament\Resources\Books\BookResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListBooks extends ListRecords
{
    protected static string $resource = BookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(),
            'available' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('available_copies', '>' , 0)),
            'unavailable' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('available_copies', 0)),
        ];
    }
}
