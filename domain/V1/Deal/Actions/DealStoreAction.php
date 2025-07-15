<?php

declare(strict_types=1);

namespace Domain\V1\Deal\Actions;

use Domain\V1\Deal\Events\DealStoredEvent;
use Domain\V1\Deal\Models\Deal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

final class DealStoreAction
{
    private Model $model;

    /**
     * @param  array<string, mixed>  $data
     */
    public function __construct(protected array $data) {}

    /**
     * @param  array<string, mixed>  $data
     */
    public static function initiate(array $data): self
    {
        return new self($data);
    }

    public function execute(): self
    {
        $this->model = new Deal();
        $this->model->name = Arr::get($this->data, 'name');
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
        event(new DealStoredEvent());

        return $this;
    }

    public function complete(): Model
    {
        return $this->model;
    }
}
