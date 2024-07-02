<?php

namespace App\Filament\Resources\AuthorResource\Pages;

use Filament\Actions;
use App\Filament\Resources\AuthorResource;
use Filament\Resources\Pages\ManageRecords;
use App\Filament\Exports\Blog\AuthorExporter;

class ManageAuthors extends ManageRecords
{
    protected static string $resource = AuthorResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ExportAction::make()
                ->exporter(AuthorExporter::class),
            Actions\CreateAction::make(),
        ];
    }
}
