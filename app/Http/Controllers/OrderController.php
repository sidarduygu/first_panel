<?php

namespace App\Http\Controllers;




use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('panel.Order.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required',
            'ammount' => 'required',
            'shipping_address' => 'required',
            'order_address' => 'required',
            'order_email' => 'required',
            'order_date' => 'required',
            'order_status' => 'required',

          ]);

          if ($validator->fails()) {
            $messages = $validator->errors();
            return redirect()->route('order.create')->withErrors($messages)->withInput();
          }

          Order::create([
            'customer_id' => $request->customer_id,
            'ammount' => $request->ammount,
            'shipping_address' => $request->shipping_address,
            'order_address' => $request->order_address,
            'order_email' => $request->order_email,
            'order_date' => $request->order_date,
            'order_status' => $request->order_status,

          ]);

         return redirect()->route('order.index');

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
        $order = Order::find($id);
        return view('panel.order.edit',['order' => $order]);
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
         $order = Order::find($id);
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required',
            'ammount' => 'required',
            'shipping_address' => 'required',
            'order_address' => 'required',
            'order_email' => 'required',
            'order_date' => 'required',
            'order_status' => 'required',

          ]);

          if ($validator->fails()) {
            $messages = $validator->errors();
            return redirect()->route('order.create')->withErrors($messages)->withInput();
          }

            $order->customer_id = $request->customer_id;
            $order->ammount = $request->ammount;
            $order->shipping_address = $request->shipping_address;
            $order->order_email = $request->order_email;
            $order->order_date = $request->quantity;
            $order->order_status = $request->order_status;



         return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::find($id)->delete();
        return redirect()->route('order.index');
    }
}
