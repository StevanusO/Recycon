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
        $item = Item::find($req->id);
        return view('ShowProductPage.show_product_detail', compact('item'));
    }
}
