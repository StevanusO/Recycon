<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
    {
        $items = Item::get();
        return view('Admin.view_item', compact('items'));
    }

    public function display_add_form()
    {
        return view('Admin.add_item');
    }

    public function addItem(Request $data)
    {
        $data->validate([
            'item_id' => 'required|unique:items,primary_id',
            'item_name' => 'required|unique:items,name|max:20',
            'item_price' => 'required|numeric|gte:1000',
            'item_description' => 'required|max:200',
            'image' => 'required',
            'item_category' => 'required|in:Recycle,Second'
        ]);

        // convert file to image
        $obj = $data->file('image');
        $client_name = $obj->getClientOriginalName();
        $client_ext = $obj->getClientOriginalExtension();
        $file_path = $client_name . time() . '.' . $client_ext;
        $obj->storeAs('public/upload_images', $file_path);

        DB::table('items')->insert([
            'primary_id' => $data->item_id,
            'name' => $data->item_name,
            'price' => $data->item_price,
            'description' => $data->item_description,
            'image' =>  $file_path,
            'category' => $data->item_category
        ]);

        return redirect()->route('view_product');
    }

    public function deleteItem(Request $data)
    {
        DB::table('items')->where('primary_id', '=', $data->id)->delete();
        return redirect()->back();
    }

    public function display_update_item(Request $data)
    {
        $item = Item::where("primary_id", '=', $data->id)->first();
        return view('Admin.update_item_form', compact('item'));
    }

    public function updateItem(Request $data)
    {

        $data->validate([
            'item_id' => 'filled|unique:items,primary_id,' . $data->item_id . ',primary_id',
            'item_name' => 'filled|max:20|unique:items,name,' . $data->item_name . ',name',
            'item_price' => 'filled|numeric|gte:1000',
            'item_description' => 'filled|max:200',
            'image' => 'filled',
            'item_category' => 'filled|in:Recycle,Second'
        ]);

        if (!$data->image) {
            $temp = $data->old_image_path;
        } else {
            $obj = $data->file('image');
            $client_name = $obj->getClientOriginalName();
            $client_ext = $obj->getClientOriginalExtension();
            $file_path = $client_name . time() . '.' . $client_ext;
            $obj->storeAs('public/upload_images', $file_path);
            $temp = $file_path;
        }


        $item = Item::where('primary_id', '=', $data->item_id)->update(
            [
                'name' => $data->item_name,
                'price' => $data->item_price,
                'description' => $data->item_description,
                'image' => $temp,
                'category' => $data->item_category
            ]
        );

        return redirect()->route('view_product');
    }
}
