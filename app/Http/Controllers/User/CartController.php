<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        $carts = Cart::getContent();
       return view('user.cart','carts');
    }
}
