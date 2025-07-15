<?php

declare(strict_types=1);

namespace Domain\V1\Deal\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class DealUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
        ];
    }
}
