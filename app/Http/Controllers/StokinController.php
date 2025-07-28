<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stokin;
use App\Models\Produk;
use Illuminate\Support\Facades\Validator;

class StokinController extends Controller
{
    public function index()
    {
        $stokins = Stokin::with('produk')->latest()->paginate(10);
        return view('stokins.index', compact('stokins'));
    }

    public function create()
    {
        $produks = Produk::all();
        return view('stokins.create', compact('produks'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Stokin::$rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Terjadi kesalahan validasi data.');
        }

        $stokin = Stokin::create([
            'produk_id' => $request->produk_id,
            'jumlah' => $request->jumlah,
            'tanggal_masuk' => $request->tanggal_masuk ?? now(),
            'keterangan' => $request->keterangan,
            'satuan' => $request->satuan ?? 'pcs',
        ]);

        return redirect()->route('stokins.index')
            ->with('success', 'Stok masuk berhasil ditambahkan.');
    }

    public function show(Stokin $stokin)
    {
        $stokin->load('produk');
        return view('stokins.show', compact('stokin'));
    }

    public function edit(Stokin $stokin)
    {
        $produks = Produk::all();
        return view('stokins.edit', compact('stokin', 'produks'));
    }

    public function update(Request $request, Stokin $stokin)
    {
        $validator = Validator::make($request->all(), Stokin::$rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Terjadi kesalahan validasi data.');
        }

        $oldJumlah = $stokin->jumlah;
        $newJumlah = $request->jumlah;
        $produkId = $stokin->produk_id;

        $stokin->update([
            'produk_id' => $request->produk_id,
            'jumlah' => $newJumlah,
            'tanggal_masuk' => $request->tanggal_masuk ?? $stokin->tanggal_masuk,
            'keterangan' => $request->keterangan,
            'satuan' => $request->satuan ?? $stokin->satuan,
        ]);

        if ($produkId != $request->produk_id || $oldJumlah != $newJumlah) {
            if ($produkId != $request->produk_id) {
                $oldProduk = Produk::find($produkId);
                $oldProduk->update([
                    'stok' => $oldProduk->stok - $oldJumlah
                ]);

                $newProduk = Produk::find($request->produk_id);
                $newProduk->update([
                    'stok' => $newProduk->stok + $newJumlah
                ]);
            } else {
                $produk = Produk::find($produkId);
                $produk->update([
                    'stok' => $produk->stok - $oldJumlah + $newJumlah
                ]);
            }
        }

        return redirect()->route('stokins.index')
            ->with('success', 'Data stok masuk berhasil diperbarui.');
    }

    public function destroy(Stokin $stokin)
    {
        $produk = $stokin->produk;
        $jumlah = $stokin->jumlah;

        $stokin->delete();

        $produk->update([
            'stok' => $produk->stok - $jumlah
        ]);

        return redirect()->route('stokins.index')
            ->with('success', 'Data stok masuk berhasil dihapus.');
    }
}
