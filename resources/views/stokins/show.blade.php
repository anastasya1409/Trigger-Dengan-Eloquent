@extends('layouts.apps')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Detail Stok Masuk</h3>
          <div class="card-tools">
            <a href="{{ route('stokins.index') }}" class="btn btn-secondary btn-sm">
              <i class="fas fa-arrow-left"></i> Kembali
            </a>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 30%">ID</th>
                  <td>{{ $stokin->id }}</td>
                </tr>
                <tr>
                  <th>Produk</th>
                  <td>{{ $stokin->produk->nama_produk }}</td>
                </tr>
                <tr>
                  <th>Jumlah</th>
                  <td>{{ $stokin->jumlah }} {{ $stokin->satuan }}</td>
                </tr>
                <tr>
                  <th>Tanggal Masuk</th>
                  <td>{{ $stokin->tanggal_masuk }}</td>
                </tr>
                <tr>
                  <th>Keterangan</th>
                  <td>{{ $stokin->keterangan ?? '-' }}</td>
                </tr>
                <tr>
                  <th>Dibuat Pada</th>
                  <td>{{ $stokin->created_at->format('d-m-Y H:i:s') }}</td>
                </tr>
                <tr>
                  <th>Diperbarui Pada</th>
                  <td>{{ $stokin->updated_at->format('d-m-Y H:i:s') }}</td>
                </tr>
              </table>
            </div>

            <div class="col-md-6">
              <div class="card">
                <div class="card-header bg-primary">
                  <h3 class="card-title">Informasi Produk</h3>
                </div>
                <div class="card-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 30%">ID Produk</th>
                      <td>{{ $stokin->produk->id }}</td>
                    </tr>
                    <tr>
                      <th>Nama Produk</th>
                      <td>{{ $stokin->produk->nama_produk }}</td>
                    </tr>
                    <tr>
                      <th>Stok Saat Ini</th>
                      <td>{{ $stokin->produk->stok }} {{ $stokin->satuan }}</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="mt-4">
            <a href="{{ route('stokins.edit', $stokin->id) }}" class="btn btn-warning">
              <i class="fas fa-edit"></i> Edit
            </a>
            <form action="{{ route('stokins.destroy', $stokin->id) }}" method="POST" class="d-inline"
              onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">
                <i class="fas fa-trash"></i> Hapus
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
