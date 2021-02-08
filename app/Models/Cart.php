<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public $items = [];
    public $totalQuantity = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQuantity = $oldCart->totalQuantity;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id)
    {
        $storedItem = ['quantity' => 0, 'price' => $item->price, 'item' => $item];

        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }

        $storedItem['quantity']++;
        $storedItem['price'] = $item->discountPrice() * $storedItem['quantity'];
        $this->items[$id] = $storedItem;
        $this->totalQuantity++;
        $this->totalPrice += $item->discountPrice();
    }

    public function increaseByOne($id)
    {
        if ($this->items[$id]['quantity'] < $this->items[$id]['item']->quantity) {
            $this->items[$id]['quantity']++;
            $this->items[$id]['price'] += $this->items[$id]['item']->discountPrice();
            $this->totalQuantity++;
            $this->totalPrice += $this->items[$id]['item']->discountPrice();
        }
    }

    public function decreaseByOne($id)
    {
        $this->items[$id]['quantity']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']->discountPrice();
        $this->totalQuantity--;
        $this->totalPrice -= $this->items[$id]['item']->discountPrice();
        if ($this->items[$id]['quantity'] == 0) {
            unset($this->items[$id]);
        }
    }

    public function updateQuantity($id, $quantity)
    {
        if ($quantity <= $this->items[$id]['item']->quantity) {

            $oldQuantity = $this->items[$id]['quantity'];
            $oldPrice = $this->items[$id]['price'];
            $this->items[$id]['quantity'] = $quantity;
            $this->items[$id]['price'] = $this->items[$id]['item']->discountPrice() * $quantity;
            $this->totalQuantity += $quantity - $oldQuantity;
            $this->totalPrice += $this->items[$id]['price'] - $oldPrice;
            if ($quantity == 0) {
                unset($this->items[$id]);
            }
        }
    }

    public function removeItem($id)
    {
        $this->totalQuantity -= $this->items[$id]['quantity'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\products');
    }
}
