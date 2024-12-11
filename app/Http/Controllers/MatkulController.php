<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Matkul; // Pastikan model Matkul sudah ada dan sesuai

class MatkulController extends Controller
{
    // Menampilkan semua mata kuliah
    public function index()
    {
        $matkuls = Matkul::all();
        return response()->json([
            'success' => true,
            'data' => $matkuls,
        ]);
    }

    // Menampilkan detail mata kuliah berdasarkan ID
    public function show($id)
    {
        $matkuls = Matkul::find($id);

        if (!$matkuls) {
            return response()->json([
                'success' => false,
                'message' => 'Mata kuliah tidak ditemukan!',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $matkuls,
        ]);
    }

    // Menambahkan mata kuliah baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_matkul' => 'required|string|max:255',
            'kode_matkul' => 'required|string|unique:matkuls|max:10',
            'sks' => 'required|integer|min:1|max:6',
        ]);

        $matkuls = Matkul::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Mata kuliah berhasil ditambahkan!',
            'data' => $matkuls,
        ]);
    }

    // Mengupdate mata kuliah
    public function update(Request $request, $id)
    {
        $matkuls = Matkul::find($id);

        if (!$matkuls) {
            return response()->json([
                'success' => false,
                'message' => 'Mata kuliah tidak ditemukan!',
            ], 404);
        }

        $validated = $request->validate([
            'nama_matkul' => 'sometimes|string|max:255',
            'kode_matkul' => 'sometimes|string|unique:matkuls,kode_matkul,' . $matkuls->id . '|max:10',
            'sks' => 'sometimes|integer|min:1|max:6',
        ]);

        $matkuls->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Mata kuliah berhasil diperbarui!',
            'data' => $matkuls,
        ]);
    }

    // Menghapus mata kuliah
    public function destroy($id)
    {
        $matkuls = Matkul::find($id);

        if (!$matkuls) {
            return response()->json([
                'success' => false,
                'message' => 'Mata kuliah tidak ditemukan!',
            ], 404);
        }

        $matkuls->delete();

        return response()->json([
            'success' => true,
            'message' => 'Mata kuliah berhasil dihapus!',
        ]);
    }
}
