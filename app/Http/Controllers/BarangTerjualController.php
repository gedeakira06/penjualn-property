<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etalase;
use App\Models\BarangTerjual;

class BarangTerjualController extends Controller
{
    /**
     * Display a listing of the sold items.
     */
    public function index()
    {
        // Ambil data barang terjual beserta etalase yang terkait
        $barangTerjual = BarangTerjual::with('etalase')->get();
        $etalase = Etalase::all();

        return view('barang-terjual.index', compact('barangTerjual', 'etalase'));
    }

    /**
     * Store a newly created sold item in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'etalase_id' => 'required|exists:etalases,id',
            'jumlah_terjual' => 'required|integer|min:1',
            'tanggal_terjual' => 'required|date',
        ]);

        // Cek stok di etalase
        $etalase = Etalase::findOrFail($validated['etalase_id']);

        if ($etalase->stock < $validated['jumlah_terjual']) {
            return redirect()->back()->withErrors(['error' => 'Stok tidak cukup untuk jumlah yang terjual.']);
        }

        // Kurangi stok dan simpan
        $etalase->decrement('stock', $validated['jumlah_terjual']);

        // Simpan data barang terjual
        BarangTerjual::create([
            'etalase_id' => $validated['etalase_id'],
            'jumlah_terjual' => $validated['jumlah_terjual'],
            'tanggal_terjual' => $validated['tanggal_terjual'],
        ]);

        return redirect()->route('barang-terjual.index')->with('success', 'Data barang terjual berhasil ditambahkan.');
    }

    /**
     * Update the specified sold item in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'etalase_id' => 'required|exists:etalases,id',
            'jumlah_terjual' => 'required|integer|min:1',
            'tanggal_terjual' => 'required|date',
        ]);

        $barangTerjual = BarangTerjual::findOrFail($id);

        // Hitung kembali stok etalase jika jumlah terjual berubah
        $etalase = Etalase::findOrFail($validated['etalase_id']);
        $stokKembali = $barangTerjual->jumlah_terjual;
        $stokBaru = $validated['jumlah_terjual'];

        if ($etalase->stock + $stokKembali < $stokBaru) {
            return redirect()->back()->withErrors(['error' => 'Stok tidak cukup untuk jumlah yang terjual.']);
        }

        // Update stok etalase
        $etalase->stock += $stokKembali - $stokBaru;
        $etalase->save();

        // Update barang terjual
        $barangTerjual->update($validated);

        return redirect()->route('barang-terjual.index')->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified sold item from storage.
     */
    public function destroy($id)
    {
        $barangTerjual = BarangTerjual::findOrFail($id);

        // Kembalikan stok ke etalase
        $etalase = Etalase::findOrFail($barangTerjual->etalase_id);
        $etalase->increment('stock', $barangTerjual->jumlah_terjual);

        // Hapus data barang terjual
        $barangTerjual->delete();

        return redirect()->route('barang-terjual.index')->with('success', 'Data berhasil dihapus.');
    }
}
