<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function index() {
        $items = Item::paginate(3);
        return view('ShowProductPage.show_product', compact('items'));
    }
}
