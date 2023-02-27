<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CustomerController extends Controller
{

    public function index()
    {
        //Get all users
        $customers = Customer::all();
        return view('panel.customer.index', ['customers' => $customers]);
    }


    public function create()
    {
        return view('panel.customer.create');
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'full_name' => 'required',
            'billing_address' => 'required',
            'default_shipping_address' => 'required',
            'country' => 'required',
            'phone' => 'required',
          ]);

          if ($validator->fails()) {
            $messages = $validator->errors();
            return redirect()->route('customer.create')->withErrors($messages)->withInput();
          }

          Customer::create([
            'email' => $request->email,
            'password' => $request->password,
            'full_name' => $request->full_name,
            'billing_address' => $request->billing_address,
            'default_shipping_address' => $request->default_shipping_address,
            'country' => $request->country,
            'phone' => $request->phone,
         
          ]);

         return redirect()->route('customer.index');

        }



    public function show($id)
    {
        //dd($id);
    }


    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('panel.customer.edit',['customer' => $customer]);
    }


    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'full_name' => 'required',
            'billing_address' => 'required',
            'default_shipping_address' => 'required',
            'country' => 'required',
            'phone' => 'required',

          ]);

          if ($validator->fails()) {
            $messages = $validator->errors();
            return redirect()->route('customer.edit', $customer->id)->withErrors($messages)->withInput();
          }

          $customer->email = $request->email;
          $customer->password = $request->password;
          $customer->full_name = $request->full_name;
          $customer->billing_address = $request->billing_address;
          $customer->default_shipping_address = $request->default_shipping_address;
          $customer->country = $request->country;
          $customer->phone = $request->phone;
          $customer->save();

         return redirect()->route('customer.index');

    }


    public function destroy($id)
    {
        Customer::find($id)->delete();
        return redirect()->route('customer.index');
    }
}
