<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'quantity',
        'weight',
    ];

    /**
     * Get the cart items for the product.
     */
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
