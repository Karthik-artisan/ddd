<?php

declare(strict_types=1);

namespace Domain\V1\Deal\Http\Controllers;

use App\Http\Controllers\Controller;
use Domain\V1\Deal\Http\Resources\DealResource;
use Domain\V1\Deal\Queries\DealIndexQuery;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class DealIndexController extends Controller
{
    public function __invoke(Request $request, DealIndexQuery $query): AnonymousResourceCollection
    {
        /**
         * @var array<string, mixed> $params
         */
        $params = $request->all();

        return DealResource::collection($query->fetch($params));
    }
}
