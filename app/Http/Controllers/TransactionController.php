<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        return view('auth.transactions');
    }

    public function checkoutOrder(Request $request)
    {
        $request->validate([
            'full-name' => 'required|min:5',
            'phone' => 'required|digits:12',
            'country' => 'required',
            'city' => 'required|min:5',
            'card-name' => 'required|min:3',
            'card-number' => 'required|numeric|digits:16',
            'address' => 'required|min:5',
            'postal-code' => 'required|numeric',
        ]);

        DB::transaction(function () use ($request) {
            $cart = Cart::where('user_id', auth()->user()->id)->first();
    
            $transaction = Transaction::create([
                'user_id' => auth()->user()->id,
            ]);
    
            foreach ($cart->cartItems as $cartItem) {
                TransactionItem::create([
                    'transaction_id' => $transaction->id,
                    'menu_id' => $cartItem->menu_id,
                    'quantity' => $cartItem->quantity,
                ]);
            }
    
            $cart->cartItems()->delete();
        });
    
        return redirect()->back()->with('success', 'Order placed successfully');
    }
}
