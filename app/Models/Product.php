<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'quantity', 'discount', 'description', 'category_id'];

    public function discountPrice()
    {
        if (round($this->discount, 2) == 0) {
            return $this->price;
        } else {
            return round($this->price * $this->discount);
        }
    }

    public function tagsToString()
    {
        $tagsName = [];
        foreach ($this->tags as  $tag) {
            $tagsName[] = $tag->name;
        }
        if ($tagsName) {
            $tagsString = '#' . implode('#', $tagsName);
            return $tagsString;
        }
    }

    public function setDiscountAttribute($value)
    {
        $this->attributes['discount'] = (float)$value / 100;
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function carts()
    {
        return $this->hasMany('App\Models\Cart');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function skus()
    {
        return $this->hasMany('App\Models\Sku');
    }
}
