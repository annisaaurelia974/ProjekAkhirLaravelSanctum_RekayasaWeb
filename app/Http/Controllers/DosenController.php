<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        return Dosen::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:dosens',
            'nama' => 'required',
            'jabatan' => 'required',
        ]);

        return Dosen::create($request->all());
    }

    public function show($id)
    {
        return Dosen::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $dosens = Dosen::findOrFail($id);
        $dosens->update($request->all());

        return $dosens;
    }

    public function destroy($id)
    {
        $dosens = Dosen::findOrFail($id);
        $dosens->delete();

        return response()->json(['message' => 'Dosen deleted successfully']);
    }
}

