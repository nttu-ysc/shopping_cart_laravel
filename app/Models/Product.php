<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'size', 'price', 'quantity', 'discount', 'description'];

    public function setDiscountAttribute($value)
    {
        $this->attributes['discount'] = (float)$value / 100;
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
