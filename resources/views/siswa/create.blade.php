@extends('layout.index')

@section('konten')
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <form action="{{route('siswa.store')}}" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama">
                            </div>

                            <div class="mb-3">
                                <div for="kelas" class="form-label">Kelas</div>
                                <select class="form-select" name="kelas">
                                    <option disabled selected>Pilih Kelas</option>
                                    <option value="XII RPL">XII RPL</option>
                                    <option value="XII DKV">XII DKV</option>
                                    <option value="XII TJKT">XII TJKT</option>
                                </select>
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-md btn-warning">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection