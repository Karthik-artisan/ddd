<?php

declare(strict_types=1);

namespace Domain\V1\Deal\Actions;

use Domain\V1\Deal\Models\Deal;
use Illuminate\Database\Eloquent\Model;

final class DealDeleteAction
{
    private Model $model;

    public function __construct(protected string $id) {}

    public static function initiate(string $id): self
    {
        return new self($id);
    }

    public function execute(): self
    {
        $this->model = Deal::query()->findOrFail($this->id);
        $this->model->save();

        return $this;
    }

    public function log(): self
    {
        // Audit log
        return $this;
    }

    public function emit(): self
    {
        // dispatch(new DealDeletedEvent());

        return $this;
    }

    public function complete(): Model
    {
        return $this->model;
    }
}
