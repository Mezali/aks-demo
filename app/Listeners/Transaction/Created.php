<?php

namespace App\Listeners\Transaction;

use App\Events\Transaction\Created as TransactionCreatedEvent;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

use App\Enums\Order\{
    OrderStatusEnum,
    PaymentStatusEnum
};
use Illuminate\Queue\{
    InteractsWithQueue,
    SerializesModels
};

class Created
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
    public function handle(TransactionCreatedEvent $event): void
    {
        $transaction = $event->transaction;

        $order = $transaction->getOrder();          

        $order->payment_status = $transaction->status;
        if (PaymentStatusEnum::from($transaction->status)->equals(PaymentStatusEnum::CONFIRMED())) {
            $order->status = OrderStatusEnum::CONFIRMED();
        }

        $order->save();
    }
}
