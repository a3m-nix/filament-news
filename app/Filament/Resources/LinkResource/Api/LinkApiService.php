<?php
namespace App\Filament\Resources\LinkResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\LinkResource;
use Illuminate\Routing\Router;


class LinkApiService extends ApiService
{
    protected static string | null $resource = LinkResource::class;

    public static function handlers() : array
    {
        return [
            Handlers\CreateHandler::class,
            Handlers\UpdateHandler::class,
            Handlers\DeleteHandler::class,
            Handlers\PaginationHandler::class,
            Handlers\DetailHandler::class
        ];

    }
}
