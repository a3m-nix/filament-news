<?php

namespace App\Filament\Resources\PostResource\Api;

use Illuminate\Routing\Router;
use Rupadana\ApiService\ApiService;
use App\Filament\Resources\PostResource;


class PostApiService extends ApiService
{
    protected static string | null $resource = PostResource::class;

    public static function handlers(): array
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
