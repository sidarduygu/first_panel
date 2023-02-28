<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('panel.product.index',['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.product.create');
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
            'name' => 'required',
            'sku' => 'required',
            'price' => 'required',
            'weight' => 'required',
            'descriptions' => 'required',
            'thumbnail' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required',
            'stock' => 'required',
          ]);

          if ($validator->fails()) {
            $messages = $validator->errors();
            return redirect()->route('product.create')->withErrors($messages)->withInput();
          }

          $imageName = time().'.'.$request->image->extension();
          $request->image->move(public_path('images'), $imageName);
          $imageName = '/images/' . $imageName;
          Product::create([
            'name' => $request->name,
            'sku' => $request->sku,
            'price' => $request->price,
            'weight' => $request->weight,
            'descriptions' => $request->descriptions,
            'thumbnail' => $request->thumbnail,
            'image' => $imageName,
            'category' => $request->category,
            'stock' => $request->stock,

          ]);

         return redirect()->route('product.index');
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
        $product = Product::find($id);
        return view('panel.product.edit',['product' => $product]);
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

        $product = Product::find($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'sku' => 'required',
            'price' => 'required',
            'weight' => 'required',
            'descriptions' => 'required',
            'thumbnail' => 'required',
            'category' => 'required',
            'stock' => 'required',
          ]);

          if ($validator->fails()) {
            $messages = $validator->errors();
            return redirect()->route('product.create')->withErrors($messages)->withInput();
          }


                 $product->name = $request->name;
                 $product->sku = $request->sku;
                 $product->price = $request->price;
                 $product->weight = $request->weight;
                 $product->descriptions = $request->descriptions;
                 $product->thumbnail = $request->thumbnail;
                 $product->image = $request->image;
                 $product->category = $request->category;
                 $product->stock = $request->stock;
                 $product->save();


         return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('product.index');
    }
}
