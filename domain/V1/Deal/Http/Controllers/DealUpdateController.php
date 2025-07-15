<?php

declare(strict_types=1);

namespace Domain\V1\Deal\Http\Controllers;

use App\Http\Controllers\Controller;
use Domain\V1\Deal\Actions\DealUpdateAction;
use Domain\V1\Deal\Http\Requests\DealUpdateRequest;
use Illuminate\Http\JsonResponse;

final class DealUpdateController extends Controller
{
    public function __invoke(DealUpdateRequest $request, string $id): JsonResponse
    {
        $data = DealUpdateAction::initiate(id: $id, data: (array) $request->validated())
            ->execute()
            ->emit()
            ->log()
            ->complete();

        return response()->json([
            'message' => 'Deal updated successfully,',
        ]);
    }
}
