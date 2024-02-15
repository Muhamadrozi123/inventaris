@extends('layout.index')

@section('konten')
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-body border-bottom py-3">
                        <div class="col-auto ms-auto d-print-none mb-3">
                            <a href="{{route('siswa.create')}}" class="btn btn-primary d-sm-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 5l0 14" />
                                    <path d="M5 12l14 0" />
                                </svg>
                                Tambah Siswa
                            </a>
                        </div>
                        @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="d-flex">
                            <div class="ms-auto text-muted">
                                Search:
                                <div class="ms-2 d-inline-block">
                                    <input type="text" class="form-control form-control-sm" aria-label="Search invoice">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($siswas as $siswa)
                                <tr>
                                    <td><span class="text-muted">{{$siswa->id}}</span></td>
                                    <td><a href="#" class="text-reset" tabindex="-1">{{$siswa->nama}}</a>
                                    </td>
                                    <td>{{($siswa->kelas) }}</td>
                                    <td class="text-end d-flex justify-content-end align-items-center">
                                        <a href="{{ route('siswa.edit', $siswa->id ) }}" class="btn btn-instagram me-2">
                                            Edit
                                        </a>
                                        <span class="dropdown">
                                            <button class="btn dropdown-toggle align-text-top"
                                                data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href='{{route('siswa.show', $siswa->id)}}'>
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-info-circle me-2" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="blue"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <!-- Tambahkan margin-right di sini -->
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                        <path d="M12 9h.01" />
                                                        <path d="M11 12h1v4h1" />
                                                    </svg>
                                                    Detail
                                                </a>
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{route('siswa.destroy', $siswa->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item" type="submit">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-trash me-2" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="red" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M4 7l16 0" />
                                                            <path d="M10 11l0 6" />
                                                            <path d="M14 11l0 6" />
                                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </span>
                                    </td>
                                </tr>
                                @empty
                                <div class="alert alert-danger mx-2 my-2">
                                    Data siswa belum Tersedia.
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="card-footer justify-content-between">
                        {{ $siswas->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
