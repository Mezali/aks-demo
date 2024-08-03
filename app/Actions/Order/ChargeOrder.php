<?php

namespace App\Actions\Order;

use App\Service\Asaas\Facades\Asaas;
use App\Service\Asaas\Requests\ChargeRequest;
use Lorisleiva\Actions\Concerns\AsAction;

use App\Models\{
    Order,
    Transaction
};

class ChargeOrder
{
    use AsAction;

    public function handle(Order $order, array $requestData)
    {        
        $response = Asaas::payments()->createCharge(
            new ChargeRequest(
                //dados do pedido
                customer: $order->client->customer_id ?? throw new \Exception("Error Processing Request - Customer ID not found"),
                billingType: $order->payment_type,
                value: $order->total,
                description: "Pagamento de pedido {$order->cart_id}",
                externalReference: $order->id,
                //dados do cartão
                name: data_get($requestData, 'holder_name', $order->client->name),
                cardNumber: data_get($requestData, 'card_number'),
                expiryMonth: data_get($requestData, 'expiry_month'),
                expiryYear: data_get($requestData, 'expiry_year'),
                ccv: data_get($requestData, 'ccv'),
                //dados do cliente
                cpfCnpj: data_get($requestData, 'document_number', $order->client->document_number),
                email: data_get($requestData, 'email', $order->client->email),
                phone: data_get($requestData, 'phone', $order->client->phone),
                postalCode: data_get($requestData, 'zip_code', $order->client->getActiveAddress()->zip_code),
                addressNumber: data_get($requestData, 'number', $order->client->getActiveAddress()->number),
            )
        );

        $transaction = new Transaction();
        $transaction->fill($response->toArray());
        $transaction->asaas_id = $response->id;
        $transaction->order_id = $order->id;
        $transaction->save();

        $order->last_transaction_id = $transaction->id;
        $order->last_transaction_status = $transaction->status;
        $order->last_transaction_date = $transaction->date;
        $order->bank_slip_bar_code = $transaction->bank_slip_bar_code;
        $order->bank_slip_url = $transaction->bank_slip_url;
        $order->save();
    }
}
