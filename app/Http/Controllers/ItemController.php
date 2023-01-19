<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::paginate(3);
        return view('ShowProductPage.show_product', compact('items'));
    }

    public function getItemDetail(Request $req)
    {
        $items = Item::where('primary_id', '=', "$req->id")->first();
        return view('ShowProductPage.show_product_detail', compact('items'));
    }

    public function itemSearch(Request $req)
    {
        $temp = $req->itemName;
        $items = Item::where('name', 'LIKE', "%$req->itemName%")->paginate(6);
        return view('search_page', compact('items', 'temp'));
    }
}
