<?php

namespace App\Filament\Resources\PostalLetterCategoryResource\Pages;

use App\Filament\Resources\PostalLetterCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPostalLetterCategory extends EditRecord
{
    protected static string $resource = PostalLetterCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
