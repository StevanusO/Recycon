<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    public function transaction_belong_user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function transaction_has_detail() {
        return $this->hasMany(TransactionDetail::class, 'transaction_id', 'id');
    }
    
}
