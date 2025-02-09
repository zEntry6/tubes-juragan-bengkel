<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BarangController extends BengkelController
{
    public function index()
    {
        $id_bengkels = DB::table('bengkels')->where('id_users', Session::get('user_id'))->value('id_bengkels');
        $barangs = DB::table('barangs')->where('id_bengkels', $id_bengkels)->get();
        return view('bengkel.barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('bengkel.barang.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Proses upload gambar
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('barang_images', 'public'); // Simpan ke storage
        } else {
            $gambarPath = null;
        }

        // Insert ke database
        DB::table('barangs')->insert([
            'id_bengkels' => DB::table('bengkels')->where('id_users', Session::get('user_id'))->value('id_bengkels'),
            'nama_barang' => $request->nama_barang,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $barang = DB::table('barangs')->where('id_barangs', $id)->first();
        return view('bengkel.barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $barang = DB::table('barangs')->where('id_barangs', $id)->first();

        // Proses upload gambar baru jika ada
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('barang_images', 'public');

            // Hapus gambar lama jika ada
            if ($barang->gambar) {
                Storage::disk('public')->delete($barang->gambar);
            }
        } else {
            $gambarPath = $barang->gambar;
        }

        // Update data barang
        DB::table('barangs')->where('id_barangs', $id)->update([
            'nama_barang' => $request->nama_barang,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $barang = DB::table('barangs')->where('id_barangs', $id)->first();

        // Hapus gambar jika ada
        if ($barang->gambar) {
            Storage::disk('public')->delete($barang->gambar);
        }

        DB::table('barangs')->where('id_barangs', $id)->delete();
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }
}
