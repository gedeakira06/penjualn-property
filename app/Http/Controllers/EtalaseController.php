<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etalase;

class EtalaseController extends Controller
{
    public function index()
    {
        $etalase = Etalase::all();
        return view('etalase.index', compact('etalase'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nama_barang' => 'required|string|max:50',
        'deskripsi' => 'required|string',
        'stock' => 'required|integer',
        'kode_barang' => 'required|string|max:50',
        'harga' => 'required|string|max:50',
    ]);

    Etalase::create($request->all());
    return redirect()->route('etalase.index')->with('success', 'Data berhasil ditambahkan!');
}

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'stock' => 'required|integer',
            'kode_barang' => 'required|string|max:50',
            'harga' => 'required|string|max:255',
        ]);

        $etalase = Etalase::findOrFail($id);
        $etalase->update($request->all());

        return redirect()->route('etalase.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy($id)
    {
        $etalase = Etalase::findOrFail($id);
        $etalase->delete();

        return redirect()->route('etalase.index')->with('success', 'Data berhasil dihapus!');
    }
}

