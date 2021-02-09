<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'item', 'quantity'];

    public $items = [];
    public $totalQuantity = 0;
    public $totalPrice = 0;

    public function loadUserCart($carts)
    {
        $this->totalQuantity = 0;
        $this->totalPrice = 0;
        foreach ($carts as $cart) {
            $this->items[$cart->product_id] =
                [
                    'quantity' => $cart->quantity,
                    'price' => $cart->product->discountPrice() * $cart->quantity,
                    'item' => $cart->product,
                ];
            $this->totalQuantity += $cart->quantity;
            $this->totalPrice += $cart->product->discountPrice() * $cart->quantity;
        }
    }

    public function getItems($oldCart)
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

    public function addQuantity($id, $quantity, $product)
    {
        if (isset($this->items[$id])) {
            $this->items[$id]['quantity'] += $quantity;
            $this->totalQuantity += $quantity;
            if ($this->items[$id]['quantity'] > $product->quantity) {
                $this->totalQuantity -= $this->items[$id]['quantity'] - $product->quantity;
                $this->items[$id]['quantity'] = $product->quantity;
            }
            $this->items[$id]['price'] += $this->items[$id]['item']->discountPrice() * $this->items[$id]['quantity'];
            $this->totalPrice += $this->items[$id]['item']->discountPrice() * $this->items[$id]['quantity'];
        } else {
            if ($quantity > $product->quantity) {
                $quantity = $product->quantity;
            }
            $this->items[$id] =
                [
                    'quantity' => $quantity,
                    'price' => $product->discountPrice() * $quantity,
                    'item' => $product,
                ];
            $this->totalQuantity += $quantity;
            $this->totalPrice += $product->discountPrice() * $quantity;
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
        return $this->belongsTo('App\Models\Product');
    }
}
