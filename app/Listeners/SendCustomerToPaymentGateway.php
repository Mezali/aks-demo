<?php

namespace App\Listeners;

use App\Events\CustomerProfileCreated;
use App\Service\Asaas\Facades\Asaas;
use App\Service\Asaas\Requests\CreateCustomerRequest;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendCustomerToPaymentGateway
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
    public function handle(CustomerProfileCreated $event): void
    {
        $user = $event->profile->user;

        $customer = new CreateCustomerRequest();
        $customer->name = $user->name;
        $customer->email = $user->email;

        $response = Asaas::customers()->create(
            $customer
        );
        $user->customer_id = $response->id;
        $user->save();
    }
}
