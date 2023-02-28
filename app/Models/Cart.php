<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    protected $guarded= [];
    protected $with = ['cartItems'];

    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }
}
