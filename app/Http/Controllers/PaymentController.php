<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Customer;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PaymentController extends Controller
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

        return view('frontend.payment',[
            'cart' => $cart,
            'cartPrice' => $cartPrice
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $cart = getUserCart();
        $cartPrice = getUserCartItemsPrice($cart->id);

        //customer olusturma
        $createCustomer = Customer::create([
            'email' => $request->email,
            'password' => Hash::make(123456),
            'full_name' => $request->first_name . ' '. $request->last_name,
            'billing_address' => $request->address . ', ' . $request->city . ', '.$request->country ,
            'default_shipping_address' => $request->address . ', ' . $request->city . ', '.$request->country ,
            'country' => $request->country,
            'phone' => $request->phone,
        ]);

        //siparis olusturma
        $createOrder = Order::create([
            'customer_id' =>  $createCustomer->id,
            'ammount' =>  $cartPrice,
            'shipping_address' =>  $createCustomer->default_shipping_address,
            'order_address' =>  $createCustomer->billing_address,
            'order_email' =>  $createCustomer->email,
            'order_date' =>  Carbon::now(),
            'order_status' =>  1,
        ]);

        //Her bir urun icin siparis detayi olusturma
        foreach ($cart->cartItems as $cartItem) {
            $createCustomer = OrderDetail::create([
                'order_id' => $createOrder->id,
                'product_id' => $cartItem->product->id,
                'price' => $cartItem->price,
                'sku' => $cartItem->product->sku,
                'quantity' => $cartItem->quantity,
            ]);
            $cartItem->active = 0;
            $cartItem->save();
        }
        $cart->status = 0;
        $cart->save();


        return redirect()->route('page.home');


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
