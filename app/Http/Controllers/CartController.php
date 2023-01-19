<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    public function index_cart()
    {
        $cart = Cart::where('user_id', '=', Auth::user()->id)->first();
        return view('User.cart', compact('cart'));
    }

    public function cart_logic(Request $data)
    {
        $data->validate([
            'Qty' => 'numeric|min:1',
        ]);

        $cart = Cart::where('user_id', '=', Auth::user()->id)->first();
        //jika carts sudah ada, maka pakai
        if ($cart != null) {
            $cart_detail = CartDetail::where('item_id', '=', $data->item_id)->where('cart_id', '=', $cart->id)->first();

            //kalau item sudah ada di carts, dan user men-add cart yang sama maka akan diambil hasil terakhir kali di add cart
            if ($cart_detail != null) {
                DB::table('cart_details')
                    ->where('cart_id', '=', $cart->id)->where('item_id', '=', $cart_detail->item_id)
                    ->update([
                        'qty' => $data->Qty
                    ]);
            }
            //item belum ada di carts, insert ke database
            else {
                DB::table('cart_details')->insert([
                    'cart_id' => $cart->id,
                    'item_id' => $data->item_id,
                    'qty' => $data->Qty
                ]);
            }
            // Jika carts tidak ada, maka buat/insert cart baru
        } else {
            DB::table('carts')->insert([
                'user_id' => Auth::user()->id
            ]);

            $cart = Cart::where('user_id', '=', Auth::user()->id)->first();

            DB::table('cart_details')->insert([
                'cart_id' => $cart->id,
                'item_id' => $data->item_id,
                'qty' => $data->Qty
            ]);
        }

        return redirect()->route('display_cart');
    }

    public function delete_item_cart_detail(Request $data)
    {
        $cart = Cart::where('user_id', '=', Auth::user()->id)->first();
        DB::table('cart_details')
            ->where('cart_id', '=', $cart->id)
            ->where('item_id', '=', $data->id)
            ->delete();
        return redirect()->back();
    }

    public function display_update_cart_item_form(Request $data)
    {
        $item = Item::where('primary_id', '=', $data->id)->first();
        $cart = Cart::where('user_id', '=', Auth::user()->id)->first();
        $cart_detail = CartDetail::where('cart_id', '=', $cart->id)->where('item_id', '=', $data->id)->first();
        return view('User.update_qty', compact('item',  'cart_detail'));
    }
}
