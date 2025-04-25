<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    /**
     * Get the items for the cart.
     */
    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    /**
     * Get the total number of items in the cart.
     */
    public function getTotalItemsCount()
    {
        return $this->items()->count();
    }

    /**
     * Get the total price of all items in the cart.
     */
    public function getTotalPrice()
    {
        return $this->items()->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });
    }

    // This method needs to be implemented to return the total weight of all products in the cart
    // public function getTotalWeight()
    // {
    //     // TODO: Implement this method
    // }
}
