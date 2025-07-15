<?php

declare(strict_types=1);

namespace Domain\V1\Deal\Listeners;
;

use Domain\V1\Deal\Events\DealStoredEvent;

final class DealUpdatedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(DealStoredEvent $event): void
    {
        //
    }
}
