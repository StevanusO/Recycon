<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;
    public function detail_belong_cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id', 'id');
    }

    public function cart_detail_belongs_item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'primary_id');
    }
}
