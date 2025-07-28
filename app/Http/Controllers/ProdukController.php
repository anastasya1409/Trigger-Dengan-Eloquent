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
        return view ('produk.index', compact('produk'));
        //
    }

    public function create()
    {
        return view ('produk.create');
        //
    }
    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $validator = $request->validate([
        'nama' => 'required|string|max:255',
        'keterangan' => 'nullable|string',
        'harga' => 'required|numeric|min:0',
        'stok' => 'required|integer|min:0',
      ]);

      $produk = new Produk();

      $produk->create([
        'nama' => $validator['nama'],
        'keterangan' => $validator['keterangan'],
        'stok' => $validator['stok'],
        'harga' => $validator['harga']
      ]);

      return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan');
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
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        //
    }
}