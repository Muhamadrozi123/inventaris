@extends('layout.index')

@section('konten')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{route('barang.update', $barang->id)}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="barang" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control @error('peminjaman') is-invalid @enderror" id="barang" name="barang" value="{{ old('barang', $barang->barang) }}">
                            @error('barang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
