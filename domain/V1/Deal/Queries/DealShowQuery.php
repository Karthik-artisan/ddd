<?php

declare(strict_types=1);

namespace Domain\V1\Deal\Queries;

use Domain\V1\Deal\Models\Deal;
use Illuminate\Support\Arr;

final readonly class DealShowQuery
{
    /**
     * @param  array<string, mixed>  $params
     */
    public function fetch(array $params): ?object
    {
        return Deal::query()
            ->where('id', Arr::get($params, 'id'))
            ->first();
    }
}
