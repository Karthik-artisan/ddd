<?php

declare(strict_types=1);

namespace Domain\V1\Deal\Http\Controllers;

use App\Http\Controllers\Controller;
use Domain\V1\Deal\Actions\DealDeleteAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class DealDeleteController extends Controller
{
    public function __invoke(Request $request, string $id): JsonResponse
    {
        $data = DealDeleteAction::initiate(id: $id)
            ->execute()
            ->emit()
            ->log()
            ->complete();

        return response()->json([
            'message' => 'Deal deleted successfully,',
        ]);
    }
}
