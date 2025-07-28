<div>
     @extends('layouts.apps')
     @section('content')
     <main class="container-fluid">
     <h3 class="text-center mt-3 mb-5">Daftar Produk</h3>
     <a class="btn btn-success" href="{{route('produk.create')}}">Tambah</a>
     <table class ="table  table-striped table-bordered my-3table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>produk</th>
                <th>keterangan</th>
                <th>stok</th>
                <th>harga</th>
                <th>action</th>
</tr>
</thead>
<body>
    @foreach ($produk as $item)
    <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->nama}}</td>
        <td>{{$item->keterangan}}</td>
        <td>{{$item->stok}}</td>
        <td>{{$item->harga}}</td>
        <td>
            <a href="/produk/{{$item->id}}/edit" class="btn btn-warning btn-sm">edit</a>
            <a href="/produk/{{$item->id}}/delete" class="btn btn-danger btn-sm">delete</a>
</tr>
@endforeach
</body>
</table>
     @endsection
</div>