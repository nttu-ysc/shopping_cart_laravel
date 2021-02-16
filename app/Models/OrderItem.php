<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    public function totalEachPrice()
    {
        if (round($this->discount, 2) == 0) {
            return $this->price * $this->quantity;
        } else {
            return round($this->price * $this->discount) * $this->quantity;
        }
    }

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
