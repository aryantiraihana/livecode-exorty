<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Produk;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $transaksi = Transaksi::all();
        $produk = Produk::all();
        return view('transaksi.index', compact('transaksi', 'produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $produk = Produk::all();
        return view('transaksi.create', compact('produk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // \Log::info('Data yang dikirim: ' . json_encode($request->all()));
        
        $request->validate([
            'date_time' => 'required', 
            'name_customer' => 'required', 
            'qty' => 'required', 
            'produk_id' => 'required',           
            'total_price' => 'required', 
        ]);

        $arrayDistinct = array_count_values($request->produk);

        $arrayAssocProduk = [];
        
    
        foreach ($arrayDistinct as $id => $count) {
           
            $produk = Produk::where('id', $id)->first();

            $subPrice = $produk['price'] * $count;

            $arrayItem = [
                "id" => $id,
                "produk" => $produk['produk'],
                "qty" => $count,
                "price" => $produk['price'],
                "total_price" => $subPrice,
            ];

            array_push($arrayAssocProduk, $arrayItem);
        }

        $totalPrice = 0;

        foreach ($arrayAssocProduk as $item){
            
            $totalPrice += (int)$item['total_price'];
        }

        $priceWithPPN = $totalPrice + ($totalPrice * 0.01);

        return redirect()->route('transaksi.home')->with('success', 'Berhasil menambahkan produk!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
