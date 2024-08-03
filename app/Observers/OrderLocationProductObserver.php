<?php

namespace App\Observers;

use App\Events\OrderLocationProduct\Created as OrderLocationProductCreated;
use App\Events\OrderLocationProduct\Updated as OrderLocationProductUpdated;
use App\Models\Notification;
use App\Models\OrderLocationProduct;

class OrderLocationProductObserver
{
    /**
     * Handle the OrderLocationProduct "created" event.
     */
    public function created(OrderLocationProduct $orderLocationProduct): void
    {
        //
    }

    /**
     * Handle the OrderLocationProduct "updated" event.
     */
    public function updated(OrderLocationProduct $orderLocationProduct): void
    {
        OrderLocationProductUpdated::dispatch($orderLocationProduct);
    }

    /**
     * Handle the OrderLocationProduct "deleted" event.
     */
    public function deleted(OrderLocationProduct $orderLocationProduct): void
    {
        //
    }

    /**
     * Handle the OrderLocationProduct "restored" event.
     */
    public function restored(OrderLocationProduct $orderLocationProduct): void
    {
        //
    }

    /**
     * Handle the OrderLocationProduct "force deleted" event.
     */
    public function forceDeleted(OrderLocationProduct $orderLocationProduct): void
    {
        //
    }
}
