<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::all();
        return view('produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produk = Produk::all();
        return view('produk.create', compact('produk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'produk' => 'required',            
            'price' => 'required',            
        ]);

        Produk::create([
            'produk' => $request->produk,            
            'price' => $request->price,            
        ]);
        
        return redirect()->route('produk.home')->with('success', 'Berhasil menambahkan produk!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk, $id)
    {
        $produk = Produk::find($id);

        return view('produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk, $id)
    {
        $request->validate([
            'produk' => 'required',
            'price' => 'required',

        ]);

        $DataBaru = [
            'produk' => $request->produk,           
            'price' => $request->price,           
        ];

        Produk::where('id', $id)->update($DataBaru);

        return redirect()->route('produk.home')->with('success', 'Berhasil mengubah data produk!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk, $id)
    {
        Produk::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }
}
