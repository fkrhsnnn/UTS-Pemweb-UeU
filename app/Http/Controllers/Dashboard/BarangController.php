<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function barang()
    {
        $barangs = Barang::all();
        return view('dashboard.barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('dashboard.barang.create');
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'nama' => 'required|max:255|min:3',
            'harga' => 'required|max:255|min:3',
            'stok' => 'required|max:255|min:3',
            'deskripsi' => 'required|max:255|min:3',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slug' => 'required|max:255|min:3',
            'kategori' => 'required|max:255|min:3',
        ]);

        $imageName = time() . '.' . $request->gambar->extension();
        Storage::putFileAs('public/images', $request->file('gambar'), $imageName);

        $data['gambar'] = $imageName;


        Barang::create($data);

        return redirect()->route('dashboard.barang.index');
    }

    public function edit($id)
    {
        $barang = Barang::find($id);
        return view('dashboard.barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama' => 'max:255|min:3',
            'harga' => 'max:255|min:3',
            'stok' => 'max:255|min:3',
            'deskripsi' => 'max:255|min:3',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slug' => 'max:255|min:3',
            'kategori' => 'max:255|min:3',
        ]);

        if ($request->hasFile('gambar')) {
            $imageName = time() . '.' . $request->gambar->extension();
            Storage::putFileAs('public/images', $request->file('gambar'), $imageName);
            $data['gambar'] = $imageName;
        }

        Barang::find($id)->update($data);

        return redirect()->route('dashboard.barang.index');
    }

    public function delete($id)
    {
        return view('dashboard.barang.delete');
    }

    public function destroy($id)
    {
        Barang::find($id)->delete();
        return redirect()->route('dashboard.barang.index');
    }
}
