<?php

declare(strict_types=1);

namespace Domain\V1\Deal\Actions;

use Domain\V1\Deal\Event\DealUpdatedEvent;
use Domain\V1\Deal\Models\Deal;
use Illuminate\Database\Eloquent\Model;

final class DealUpdateAction
{
    private Model $model;

    /**
     * @param  array<string, mixed>  $data
     */
    public function __construct(protected string $id, protected array $data) {}

    /**
     * @param  array<string, mixed>  $data
     */
    public static function initiate(string $id, array $data): self
    {
        return new self($id, $data);
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
        dispatch(new DealUpdatedEvent());

        return $this;
    }

    public function complete(): Model
    {
        return $this->model;
    }
}
