<?php

declare(strict_types=1);

namespace Domain\V1\Deal\Exceptions;

use Exception;
use Illuminate\Http\Request;

final class DealAlreadyExistsException extends Exception
{
    public function render(Request $request): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'message' => 'Deal already exists.',
        ], 422);
    }
}
