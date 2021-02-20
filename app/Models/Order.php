<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['firstName', 'lastName', 'email', 'mobile', 'email', 'country', 'address', 'remark'];

    public function totalQuantity()
    {
        $totalQuantity = 0;
        foreach ($this->orderItems as $item) {
            $totalQuantity += $item->productData['quantity'];
        }
        return $totalQuantity;
    }

    public function totalPrice()
    {
        $totalPrice = 0;
        foreach ($this->orderItems as $item) {
            $totalPrice += $item->totalEachPrice();
        }
        return $totalPrice;
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function orderItems()
    {
        return $this->hasMany('App\Models\OrderItem');
    }
}
