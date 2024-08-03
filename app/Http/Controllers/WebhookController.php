<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Service\Asaas\Entities\Payment;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    /**
     * @unauthenticated
     */
    public function payment(Request $request)
    {
        if ($request->has('payment')) {
            $transaction = new Transaction();
            $transaction->fill((new Payment($request->payment))->toArray());
            $transaction->event_id = $request->id;
            $transaction->event_type = $request->event;
            $transaction->event_date_created = $request->dateCreated;
            $transaction->order_id = intval($transaction->external_reference);
            $transaction->asaas_id = $request->payment['id'];
            if ($transaction->save()) {
                return response()->json(['message' => 'Pagamento registrado com sucesso'], 200);
            } else {
                return response()->json(['message' => 'Erro ao registrar pagamento'], 500);
            }
        } else {
            return response()->json(['message' => 'Pagamento não encontrado'], 404);
        }
    }
}
