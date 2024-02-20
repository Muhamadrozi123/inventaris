<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Barang; // Import model Barang di sini

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::orderBy('id')->paginate(5);
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        // Validate form
        $this->validate($request, [
            'barang' => 'required|min:2',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Upload image
        $gambar = $request->file('gambar');
        $gambar->storeAs('public/posts', $gambar->hashName());

        // Create barang
        Barang::create([
            'barang' => $request->barang,
            'gambar' => $gambar->hashName(),
        ]);

        // Redirect to index
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, Barang $barang)
    {
        // Validate form
        $this->validate($request, [
            'barang' => 'required|min:5',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Menjadi nullable karena gambar tidak selalu diubah
        ]);

        // Update barang data
        $barang->update([
            'barang' => $request->barang,
        ]);

        // Check if new image is uploaded
        if ($request->hasFile('gambar')) {
            // Upload new image
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/posts', $gambar->hashName());

            // Delete old image
            Storage::delete('storage/posts/' . $barang->gambar);

            // Update barang with new image
            $barang->update([
                'gambar' => $gambar->hashName(),
            ]);
        }

        // Redirect to index
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Diubah!']);
    }


    public function destroy($id)
    {
        // $barang = Barang::find($id);

        
        // // Hapus gambar dari penyimpanan (storage)
        // Storage::delete('storage/posts/' . $barang->gambar);
        // $barang->delete();

        // // Hapus barang dari database

        // // Redirect ke index atau rute lainnya
        // return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus');
        $barang = Barang::find($id);
        if ($barang) {
            // Periksa apakah barang masih dipakai dalam peminjaman
            $p = Peminjaman::where('id_barang', $barang->id)->exists();
            // dd($p);
            if ($p) {
                return redirect('/barang')->with('error', 'Data barang masih dipakai dan tidak dapat dihapus!');
            }

            // Jika tidak dipakai, hapus gambar dan hapus barang
            Storage::delete('public/images/' . $barang->gambar);
            $barang->delete();
            return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus');
        }
    }
}
