<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Ticket;
use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TiketController extends Controller
{
    public function tiket()
    {
        $ticketTypes = Ticket::all();
        return view('tiket.create', compact('ticketTypes'));
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'ticket_type' => 'required|string',
            'visit_date' => 'required|date|after_or_equal:today',
            'visitor_count' => 'required|integer|min:1',
            'notes' => 'nullable|string|max:1000',
            'gross_amount' => 'required|integer|min:0',
            'price' => 'required|integer|min:0',
        ], [
            'ticket_type.required' => 'Tipe tiket wajib dipilih.',
            'visit_date.required' => 'Tanggal kunjungan wajib diisi.',
            'visit_date.after_or_equal' => 'Tanggal kunjungan tidak boleh tanggal yang sudah lewat.',
            'visitor_count.required' => 'Jumlah pengunjung wajib diisi dan minimal 1.',
            'price.required' => 'Harga tiket wajib diisi.',
            'gross_amount.required' => 'Total harga wajib diisi.',
        ]);

        $user = auth()->user();

        // Enforce authenticated user identity; ignore any form overrides
        $validatedData['user_id'] = $user->id;
        $validatedData['name'] = $user->name;
        $validatedData['email'] = $user->email;
        $validatedData['phone'] = $user->no_hp;

        $validatedData['invoice_number'] = 'INV' . strtoupper(uniqid());

        Transaction::create($validatedData);

        return redirect()->route('detail', $validatedData['invoice_number'])
            ->with('success', 'Tiket berhasil dipesan! Silakan cek detail tiket Anda.');
    }

    public function detail(Transaction $transaction )
    {
        // fitur A
        $payment = $transaction->payment;
        $snap_token = '';
        // ini cek apakah sudah ada payment dan snap token,kalau ada gunakan itu,kalau belum buat baru
        if ($payment != null && $payment->snap_token){
            $snap_token = $payment->snap_token;
        }else if($payment == null || $payment->status != 'success') {

            $visitDate =$transaction->visit_date;

            $expiryTime = Carbon::createFromFormat('Y-m-d', $visitDate)
                ->subDay()
                ->endOfday()
                ->timeZone('Asia/Jakarta');

            $now = Carbon::now('Asia/Jakarta');
            $durationInMinutes = $now->diffInMinutes($expiryTime);

            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            \Midtrans\Config::$isProduction = config('midtrans.is_production');
            \Midtrans\Config::$is3ds = config('midtrans.is_3ds');

            $transaction_details = array(
                'order_id' => $transaction->invoice_number,
                'gross_amount' => $transaction->gross_amount,
            );

            $customer_details = array(
                'first_name'    => $transaction->name,
                'last_name'     => "",
                'email'         => $transaction->email,
                'phone'         => $transaction->phone,
            );

            $item_details = [[
                'id' => '',
                'price' => $transaction->price,
                'quantity' => $transaction->visitor_count,
                'name' => $transaction->ticket_type,
            ]];

            $expiry = array(
                'start_time' => $now->format('Y-m-d H:i:s O'),
                'unit' => 'minute',
                'duration'  => $durationInMinutes,
            );

            $transaction_midtrans = array(
                'transaction_details' => $transaction_details,
                'customer_details' => $customer_details,
                'item_details' => $item_details,
                'expiry' => $expiry,
            );

            $snap_token = '';
            try {
                $snap_token = \Midtrans\Snap::getSnapToken($transaction_midtrans);
                Payment::updateOrCreate(
                    [
                        'transaction_id' => $transaction->id
                    ],
                    [
                        'amount' => $transaction->gross_amount,
                        'status' => 'pending',
                        'snap_token' => $snap_token
                    ]);
                }
            catch (\Exception $e) {
                $snap_token = '';
            }

        }

        return view('tiket.detail', compact('transaction', 'snap_token'));
    }

    public function detailTicket(Transaction $transaction)
    {
        return view('detailTicket', compact('transaction'));
    }
}
