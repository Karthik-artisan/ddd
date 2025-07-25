<?php

declare(strict_types=1);

namespace Domain\V1\Deal\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

final class DealUpdatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct() {}
}
