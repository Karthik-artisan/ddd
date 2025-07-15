<?php

declare(strict_types=1);

namespace Domain\V1\Deal\Queries;

use Domain\V1\Deal\Models\Deal;
use Illuminate\Contracts\Pagination\CursorPaginator;

final readonly class DealIndexQuery
{
    /**
     * @param  array<string, mixed>  $params
     * @return CursorPaginator<int, Deal>
     */
    public function fetch(array $params): CursorPaginator
    {
        return Deal::query()
            ->orderBy('created_at')
            ->cursorPaginate();
    }
}
