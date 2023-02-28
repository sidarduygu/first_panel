<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::take(10)->get();
        return view('frontend.index' , [
            'products' => $products
        ]);
    }
}
