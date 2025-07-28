@extends('layouts.apps')
@section('content')
<div class='container'>
    <div class='card'>
        <h2>Tambah Data</h2>
        <div class='card-body'>
            <form action="{{route('produk.store')}}" method='POST'>
                @csrf
                <label>Nama Produk</label>
                <input type='text' name='nama' class='form-control'>
                <label>Stok</label>
                <input type='number' name='stok' class='form-control'>
                <label>Harga</label>
                <input type='number' name='harga' class='form-control'>
                <label>Keterangan</label>
                <textarea name='keterangan' class='form-control'></textarea>
                <button type='submit' class='btn btn-primary'>Simpan</button>
</form>
</div>
</div>
</div>
@endsection