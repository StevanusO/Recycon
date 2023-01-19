<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function display_transaction_history()
    {
        $th = Transaction::where('user_id', '=', Auth::user()->id)->get();
        return view('User.transaction_history', compact('th'));
    }

    public function insert_transaction_history(Request $data)
    {
        $data->validate([
            'receiver_address' => 'filled'
        ]);

        // Insert dari cart ke transaction
        $cart = Cart::where('user_id', '=', Auth::user()->id)->first();
        $cart_detail = CartDetail::where('cart_id', '=', $cart->id)->get();
        $date = Carbon::now();

        // dd($cart->user_id, $data->receiver_name, $data->receiver_address);
        DB::table('transactions')->insert([
            'user_id' => $cart->user_id,
            'receiver_name' => $data->receiver_name,
            'receiver_address' => $data->receiver_address,
            'created_at' => $date
        ]);

        $header = Transaction::where('user_id', '=', $cart->user_id)
            ->where('receiver_name', '=', $data->receiver_name)
            ->where('receiver_address', '=', $data->receiver_address)
            ->where('created_at', '=', $date)->first();

        // dd($cart_detail->toArray());
        foreach ($cart_detail as $item) {
            // dd($header->id);
            DB::table('transaction_details')->insert([
                'transaction_id' => $header->id,
                'item_id' => $item->item_id,
                'qty' => $item->qty,
            ]);
        }
        // Delete dari cart
        $cart_d = Cart::find($cart->id)->delete();
        return redirect()->route('display_product');
    }
}
