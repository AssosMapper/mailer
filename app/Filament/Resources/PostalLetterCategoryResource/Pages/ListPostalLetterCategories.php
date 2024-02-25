<?php

namespace App\Filament\Resources\PostalLetterCategoryResource\Pages;

use App\Filament\Resources\PostalLetterCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPostalLetterCategories extends ListRecords
{
    protected static string $resource = PostalLetterCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
