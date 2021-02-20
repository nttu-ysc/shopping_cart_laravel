<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'sku_id', 'item', 'quantity'];

    public $items = [];
    public $totalQuantity = 0;
    public $totalPrice = 0;
    public $loadCount = 0;

    public function loadUserCart($carts)
    {
        foreach ($carts as $cart) {
            if (!isset($this->items[$cart->product_id][$cart->sku_id])) {
                $this->totalQuantity += $cart->quantity;
                $this->totalPrice += $cart->product->discountPrice() * $cart->quantity;
            } else {
                $this->totalQuantity +=  $cart->quantity - $this->items[$cart->product_id][$cart->sku_id]['quantity'];
                $this->totalPrice += $cart->product->discountPrice() * $cart->quantity - $this->items[$cart->product_id][$cart->sku_id]['price'];
            }
            $this->items[$cart->product_id][$cart->sku_id] =
                [
                    'quantity' => $cart->quantity,
                    'price' => $cart->product->discountPrice() * $cart->quantity,
                    'sku' => $cart->sku,
                    'item' => $cart->product,
                ];
        }
        $this->loadCount++;
    }

    public function getItems($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQuantity = $oldCart->totalQuantity;
            $this->totalPrice = $oldCart->totalPrice;
            $this->loadCount = $oldCart->loadCount;
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

    public function increaseByOne($id, $sku)
    {
        if ($this->items[$id][$sku->id]['quantity'] < $this->items[$id][$sku->id]['item']->quantity) {
            $this->items[$id][$sku->id]['quantity']++;
            $this->items[$id][$sku->id]['price'] += $this->items[$id][$sku->id]['item']->discountPrice();
            $this->totalQuantity++;
            $this->totalPrice += $this->items[$id][$sku->id]['item']->discountPrice();
        }
    }

    public function decreaseByOne($id, $sku)
    {
        $this->items[$id][$sku->id]['quantity']--;
        $this->items[$id][$sku->id]['price'] -= $this->items[$id][$sku->id]['item']->discountPrice();
        $this->totalQuantity--;
        $this->totalPrice -= $this->items[$id][$sku->id]['item']->discountPrice();
        if ($this->items[$id][$sku->id]['quantity'] == 0) {
            unset($this->items[$id][$sku->id]);
            if (empty($this->items[$id]))
                unset($this->items[$id]);
        }
    }

    public function addQuantity($id, $quantity, $product, $sku)
    {
        $hasSpec = 0;
        foreach ($this->items as $item) {
            foreach ($item as  $sku1) {
                if ($sku1['sku']->id === $sku->id)
                    $hasSpec = 1;
            }
        }
        if (isset($this->items[$id]) && $hasSpec) {
            $this->items[$id][$sku->id]['quantity'] += $quantity;
            $this->totalQuantity += $quantity;
            if ($this->items[$id][$sku->id]['quantity'] > $product->quantity) {
                $this->totalQuantity -= $this->items[$id][$sku->id]['quantity'] - $product->quantity;
                $this->items[$id][$sku->id]['quantity'] = $product->quantity;
            }
            $this->items[$id][$sku->id]['price'] += $this->items[$id][$sku->id]['item']->discountPrice() * $this->items[$id][$sku->id]['quantity'];
            $this->totalPrice += $this->items[$id][$sku->id]['item']->discountPrice() * $this->items[$id][$sku->id]['quantity'];
        } else {
            if ($quantity > $product->quantity) {
                $quantity = $product->quantity;
            }
            $this->items[$id][$sku->id] =
                [
                    'quantity' => (int)$quantity,
                    'price' => $product->discountPrice() * $quantity,
                    'sku' => $sku,
                    'item' => $product,
                ];
            $this->totalQuantity += $quantity;
            $this->totalPrice += $product->discountPrice() * $quantity;
        }
    }

    public function updateQuantity($id, $sku, $quantity)
    {
        if ($quantity <= $this->items[$id][$sku->id]['item']->quantity) {

            $oldQuantity = $this->items[$id][$sku->id]['quantity'];
            $oldPrice = $this->items[$id][$sku->id]['price'];
            $this->items[$id][$sku->id]['quantity'] = $quantity;
            $this->items[$id][$sku->id]['price'] = $this->items[$id][$sku->id]['item']->discountPrice() * $quantity;
            $this->totalQuantity += $quantity - $oldQuantity;
            $this->totalPrice += $this->items[$id][$sku->id]['price'] - $oldPrice;
            if ($quantity == 0) {
                unset($this->items[$id][$sku->id]);
            }
        }
    }

    public function removeItem($id, $sku)
    {
        $this->totalQuantity -= $this->items[$id][$sku->id]['quantity'];
        $this->totalPrice -= $this->items[$id][$sku->id]['price'];
        unset($this->items[$id][$sku->id]);
        if (empty($this->items[$id]))
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

    public function sku()
    {
        return $this->belongsTo('App\Models\Sku');
    }
}
