@extends('layout.index')

@section('konten')
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Peminjaman</h3>
                    </div>
                    <div class="card-body border-bottom py-3">
                        <div class="col-auto ms-auto d-print-none mb-3">
                            <a href="{{ route('peminjaman.create') }}" class="btn btn-primary d-sm-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 5l0 14" />
                                    <path d="M5 12l14 0" />
                                </svg>
                                Tambah
                            </a>
                        </div>
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap datatable">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Barang Pinjam</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($peminjaman as $item)
                                    <tr>
                                        <td><span class="text-muted">{{ $item->siswa->nama }}</span></td>
                                        <td>
                                            <img src="{{ asset('storage/posts/'. $item->barang->gambar)  }}" class="rounded" style="width: 150px">

                                        </td>   
                                        <td>{{ $item->tgl_pinjam }}</td>
                                        <td>{{ $item->tgl_kembali }}</td>
                                        <td class="text-end">
                                            <a class="btn btn-primary d-sm-inline-block" href='{{route('peminjaman.edit', $item->id)}}' >
                                                Edit
                                            </a> 
                                            <form action="{{ route('peminjaman.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit" onclick="return confirm('yakin?')">Hapus</button>
                                            </form>
                                                
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <div class="alert alert-danger mx-2 my-2">
                                                Data siswa belum Tersedia.
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer justify-content-between">
                        {{ $peminjaman->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
