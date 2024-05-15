<?php

namespace App\Filament\Resources\Section1Resource\Pages;

use App\Filament\Resources\Section1Resource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSection1s extends ListRecords
{
    protected static string $resource = Section1Resource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
