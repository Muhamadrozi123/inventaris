<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Peminjaman;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::paginate(2);
        $datas = Siswa::all();
        $datagambars = barang::all();
        return view('peminjaman.index', compact('peminjaman', 'datas', 'datagambars'));
    }
    public function create()
    {
        $barang = Barang::all();
        $siswa = Siswa::all();
        $peminjaman = Peminjaman::with(['siswa'])->get();
        // dd($peminjaman);
        return view('peminjaman.create', compact('barang', 'siswa','peminjaman'));
    }
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'id_siswa' => 'required',
            'id_barang' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required'
        ]);

        //create post
        Peminjaman::create([
            'id_siswa' => $request->id_siswa,
            'id_barang' => $request->id_barang,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali



        ]);

        //redirect to index
        return redirect()->route('peminjaman.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function show(Peminjaman $peminjaman)
    {
        // return view('peminjaman.index', compact('peminjaman'));
    }
    public function edit(Peminjaman $peminjaman)
    {
        $barang = Barang::all();
        $siswa = Siswa::all();
        return view('peminjaman.edit', compact('peminjaman', 'barang', 'siswa'));
    }
        public function update(Request $request, peminjaman $peminjaman)
    {
        //validate form
        $this->validate($request, [
            'id_siswa'=> 'required',
            'id_barang'=> 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' =>'required'
        ]);
        //create post
        $peminjaman->update([
            'id_siswa' => $request->id_siswa,
            'id_barang' => $request->id_barang,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali

            ]);

        //redirect to index
    return redirect()->route('peminjaman.index')->with(['success' => 'Data Berhasil Disimpan!']);
}
    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();
        return redirect()->route('peminjaman.index')->with(['success' => 'Data Berhasil di hapus!']);
        
    }
}