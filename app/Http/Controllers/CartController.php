<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $cart = getUserCart();
        $cartPrice = getUserCartItemsPrice($cart->id);

        return view('frontend.shopping-cart',[
            'cart' => $cart,
            'cartPrice' => $cartPrice
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        dd($request->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $product = Product::find($request->product_id);
        $userCartExist = Cart::where(['session_id' => $request->session()->getID(), 'status' => 1])->first();

        if(!$userCartExist){
            $userCartExist = Cart::create([
                'customer_id' => 1,
                'session_id' => $request->session()->getID(),
                'status'=> 1
            ]);
        }
        $cartItemExist = CartItem::where(['cart_id' => $userCartExist->id, 'product_id' => $product->id])->first();

        if($cartItemExist){
            $cartItemExist->quantity += 1;
            $cartItemExist->price += $cartItemExist->product->price ;
            $cartItemExist->save(); 
        }else{
            CartItem::create(
                [
                    'product_id' => $product->id,
                    'cart_id' => $userCartExist->id,
                    'content' => 'test',
                    'sku' => $product->sku,
                    'price' => $product->price,
                    'discount' => 20,
                    'quantity' => 1,
                    'active' => 1,
                ]
            );
        }
       
        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
