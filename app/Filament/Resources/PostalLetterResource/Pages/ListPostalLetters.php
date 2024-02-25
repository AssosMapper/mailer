<?php

namespace App\Filament\Resources\PostalLetterResource\Pages;

use App\Filament\Resources\PostalLetterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPostalLetters extends ListRecords
{
    protected static string $resource = PostalLetterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
