<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Braintree\Transaction as Braintree_Transaction;
class PaymentsController extends Controller
{
    public function make(Request $request)
    {
        $payload = $request->input("payload", false);
        $nonce = $payload["nonce"];
        $status = Braintree_Transaction::sale([
                                "amount" => "110.00",
                                "paymentMethodNonce" => $nonce,
                                "options" => [
                                           "submitForSettlement" => True
                                             ]
                  ]);
        return response()->json($status);
    }
}
