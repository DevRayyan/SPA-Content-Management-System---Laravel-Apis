<?php

namespace App\Http\Controllers;

use Error as GlobalError;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Exception\Error;

class PaymentController extends Controller

{
    public function createPaymentIntent(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            // $items = $request->json('items');
            // $amount = $this->calculateOrderAmount($items);

            $paymentIntent = PaymentIntent::create([
                'amount' => $request->price,
                'currency' => 'usd',
                'automatic_payment_methods' => [
                    'enabled' => true,
                ],
            ]);
            return response()->json([
                'clientSecret' => $paymentIntent->client_secret,
            ]);
        } catch (GlobalError $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }
    public function updatePaymentStatus(){
        
    }
}
