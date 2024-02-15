@extends('layout.index')

@section('konten')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Method spoofing untuk HTTP PUT -->
                        <div class="mb-3">
                            <label for="siswa" class="form-label">Nama Siswa</label>
                            <select class="form-select" name="id_siswa">
                                <option disabled>Pilih Siswa</option>
                                @foreach ($siswa as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $peminjaman->siswa->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="font-weight-bold">Pilih Barang</label>
                                <select class="form-select" name="id_barang">
                                    <option disabled>Pilih Barang</option>
                                    @foreach ($barang as $item)
                                        <option value="{{ $item->id }}" {{ $item->id == $peminjaman->barang->id ? 'selected' : '' }}>{{ $item->barang }}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="mb-3">
                            <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                            <input type="date" class="form-control @error('tgl_pinjam') is-invalid @enderror" id="tgl_pinjam" name="tgl_pinjam" value="{{ $peminjaman->tgl_pinjam }}">
                            @error('tgl_pinjam')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
                            <input type="date" class="form-control @error('tgl_kembali') is-invalid @enderror" id="tgl_kembali" name="tgl_kembali" value="{{ $peminjaman->tgl_kembali }}">
                            @error('tgl_kembali')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
