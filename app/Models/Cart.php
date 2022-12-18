<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public function cart_belong_user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function cart_has_detail() {
        return $this->hasMany(CartDetail::class, 'cart_id', 'id');
    }
}
