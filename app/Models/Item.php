<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    public function item_has_detail_cart(){
        return $this->hasMany(CartDetail::class, 'item_id', 'id');
    }

    public function item_has_detail_transaction(){
        return $this->hasMany(TransactionDetail::class, 'item_id', 'id');
    }
}
