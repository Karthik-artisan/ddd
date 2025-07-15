<?php

declare(strict_types=1);

namespace Domain\V1\Deal\Http\Controllers;

use App\Http\Controllers\Controller;
use Domain\V1\Deal\Actions\DealStoreAction;
use Domain\V1\Deal\Http\Requests\DealStoreRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

final class DealStoreController extends Controller
{
    public function __invoke(DealStoreRequest $request): JsonResponse
    {
        $data = DealStoreAction::initiate($request->validated())
            ->execute()
            ->emit()
            ->log()
            ->complete();

        return response()->json([
            'message' => 'Deal created successfully,',
        ], Response::HTTP_CREATED);
    }
}
