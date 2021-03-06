<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'color', 'size',];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function carts()
    {
        return $this->hasMany('App\Models\Cart');
    }

    public function orderItems()
    {
        return $this->hasMany('App\Models\OrderItem');
    }
}
