<?php

namespace App\Filament\Resources\Categories\Pages;

use App\Filament\Resources\Categories\CategoryResource;
use App\Models\Category;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Support\Enums\IconPosition;
use Illuminate\Database\Eloquent\Builder;


class ListCategories extends ListRecords
{
    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

//    public function getTabs(): array
//    {
//        return [
//            'all' => Tab::make()
//                ->icon('heroicon-m-user-group')
////                ->badgeColor('success')
//                ->badge(Category::count()) ,
////                ->iconPosition(IconPosition::After),
//            'active' => Tab::make()
//                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', true)),
//            'inactive' => Tab::make()
//                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', false)),
//        ];
//    }

    public function getDefaultActiveTab(): string | int | null
    {
        return 'all';
    }
}
