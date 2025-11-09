<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function handleCallback(Request $request)
    {
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');

        $notif = new \Midtrans\Notification();

        $transaction = $notif->transaction_status;
        $fraud = $notif->fraud_status;

        $orderId = $notif->order_id;

        $transaction_model = Transaction::where('invoice_number', $orderId)->first();
        if (!$transaction_model) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        if ($transaction == 'capture') {
            if ($fraud == 'accept') {
                $this->updateOrderStatus($transaction_model, 'success', $notif);
            }
        }
        else if ($transaction == 'cancel') {
            $this->updateOrderStatus($transaction_model, 'canceled', $notif);
        }
        else if ($transaction == 'deny') {
            $this->updateOrderStatus($transaction_model, 'failed', $notif);
        }
        else if ($transaction == 'settlement') {
            $this->updateOrderStatus($transaction_model, 'success', $notif);
        }
    }

    protected function updateOrderStatus(Transaction $transaction, string $status, $notif)
    {
        $transaction->update(['payment_status' => $status]);

        Payment::updateOrCreate(
            [
                'transaction_id' => $transaction->id
            ],
            [
                'payment_method' => $notif->payment_type,
                'amount' => $notif->gross_amount,
                'status' => $status,
                'payment_date' => in_array($status, ['success', 'settlement']) ? now() : null,
            ]);
    }

}
