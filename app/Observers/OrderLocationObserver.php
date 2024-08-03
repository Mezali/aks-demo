<?php

namespace App\Observers;

use App\Events\OrderLocation\Created as OrderLocationCreated;
use App\Events\OrderLocation\Updated as OrderLocationUpdated;
use App\Models\Notification;
use App\Models\OrderLocation;

class OrderLocationObserver
{
    /**
     * Handle the OrderLocation "created" event.
     */
    public function created(OrderLocation $orderLocation): void
    {
        OrderLocationCreated::dispatch($orderLocation);
    }

    /**
     * Handle the OrderLocation "updated" event.
     */
    public function updated(OrderLocation $orderLocation): void
    {
        OrderLocationUpdated::dispatch($orderLocation);
    }

    /**
     * Handle the OrderLocation "deleted" event.
     */
    public function deleted(OrderLocation $orderLocation): void
    {
        //
    }

    /**
     * Handle the OrderLocation "restored" event.
     */
    public function restored(OrderLocation $orderLocation): void
    {
        //
    }

    /**
     * Handle the OrderLocation "force deleted" event.
     */
    public function forceDeleted(OrderLocation $orderLocation): void
    {
        //
    }
}
