<?php

declare(strict_types=1);

namespace Domain\V1\Deal\Http\Controllers;

use App\Http\Controllers\Controller;
use Domain\V1\Deal\Http\Resources\DealResource;
use Domain\V1\Deal\Queries\DealShowQuery;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

final class DealShowController extends Controller
{
    public function __invoke(Request $request, DealShowQuery $query): DealResource
    {
        $data = $query->fetch(['id' => $request->id]);

        abort_unless((bool) $data, Response::HTTP_NOT_FOUND, 'Requested resource identifier not found.');

        return new DealResource($data);
    }
}
