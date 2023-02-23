<?php

namespace App\Http\Controllers;

use App\Models\Fatura;
use Illuminate\Http\Request;

class FaturaController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function faturaOlustur()
    {
        return view('fatura-olustur');
    }
   
    public function faturaOlusturmaMethodu(Request $request)
    {
        //Datayi goster ne var ne yok icinde
        //dd($request->all());

        //Veritabanina kaydetmemiz lazim

        $olusanVeri = Fatura::create([
            'item' => $request->item,
            'description' => $request->description,
            'rate' => $request->rate,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'additional_notes' => $request->additional_notes,
            'address_info' => $request->address_info,
        ]);

        //olusan Veriyi gosterme
       // dd($olusanVeri);

       return redirect()->route('fatura.goster', $olusanVeri->id);

    }

    public function goster($id)
    {   
        //id elimizde, veritabanindan faturayi getirip ekrana yazdiracaz
        $fatura = Fatura::find($id);

        //faturayi viewe gonderiyoruz
        return view('fatura-goster', ['fatura' => $fatura]);
    }
}
