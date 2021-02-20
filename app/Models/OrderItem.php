<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $casts = [
        'productData' => 'array',
    ];

    public function totalEachPrice()
    {
        return $this->discountPrice() * $this->productData['quantity'];
    }

    public function discountPrice()
    {
        if (round($this->productData['discount'], 2) == 0) {
            return $this->productData['price'];
        } else {
            return round($this->productData['price'] * $this->productData['discount']);
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

    public function sku()
    {
        return $this->belongsTo('App\Models\Sku');
    }
}
