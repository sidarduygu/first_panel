<?php

use App\Models\Cart;
use App\Models\CartItem;



if (!function_exists('getUserCart')) {
    function getUserCart()
    {
        return Cart::where(['session_id' => request()->session()->getID(), 'status' => 1])->first();
    }
}

if (!function_exists('getUserCartItemsPrice')) {
    function getUserCartItemsPrice(int $cartID = null)
    {
        if ($cartID) {
            return  CartItem::where(['cart_id' => $cartID, 'active' => 1])->sum('price');
        }
    }
}
