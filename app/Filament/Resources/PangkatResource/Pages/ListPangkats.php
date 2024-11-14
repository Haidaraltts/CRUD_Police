<?php

namespace App\Filament\Resources\PangkatResource\Pages;

use App\Filament\Resources\PangkatResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPangkats extends ListRecords
{
    protected static string $resource = PangkatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
