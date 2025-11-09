<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{


   public function index()
   {
       $authId = auth()->id();

       $paymentPendingItems = Transaction::query()
           ->where('user_id', $authId)
           ->where(function ($q) {
               $q->where('payment_status', 'pending')
                 ->orWhereHas('payment', function ($p) {
                     $p->where('status', 'pending');
                 });
           })
           ->orderByDesc('created_at')
           ->paginate(10);

       $paymentSuccessItems = Transaction::query()
           ->where('user_id', $authId)
           ->where(function ($q) {
               $q->where('payment_status', 'success')
                 ->orWhereHas('payment', function ($p) {
                     $p->where('status', 'success')
                       ->orWhere('status', 'settlement');
                 });
           })
           ->orderByDesc('created_at')
           ->paginate(10);

       return view('shoppingCart', compact('paymentPendingItems', 'paymentSuccessItems'));
   }


}
