<?php

namespace App\Filament\Resources\Categories\Pages;

use App\Filament\Resources\Categories\CategoryResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;



//    protected static bool $canCreateAnother = false ;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['slug'] = Str::slug($data['name'] , '_') . '-' . Str::random(5);
        return $data ;
    }

    protected function handleRecordCreation(array $data): Model
    {
        $record = new ($this->getModel())($data);

        if ($parentRecord = $this->getParentRecord()) {
            return $this->associateRecordWithParent($record, $parentRecord);
        }

        $record->save();

        log::info('handle record ') ;

        return $record;
    }


    protected function getRedirectUrl(): string
    {
        return CategoryResource::getUrl('index');
    }


    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Created Category';
    }


    protected function preserveFormDataWhenCreatingAnother(array $data): array
    {
        return [
            'name' => $data['name'],
        ];
    }



}
