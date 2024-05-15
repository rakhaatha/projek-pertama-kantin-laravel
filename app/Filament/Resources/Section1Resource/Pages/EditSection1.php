<?php

namespace App\Filament\Resources\Section1Resource\Pages;

use App\Filament\Resources\Section1Resource;
use App\Models\section;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSection1 extends EditRecord
{
    protected static string $resource = Section1Resource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()->after(
                function(section $record) {
                    if($record->thumbnail){
                        storage::disk('publick')->delete($record->thumbnail);
                    }
                }
            ),
        ];
    }
}
