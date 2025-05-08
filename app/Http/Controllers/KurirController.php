<?php

namespace App\Http\Controllers;

use App\Models\Kurir;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class KurirController extends Controller
{
    public function index()
    {
        $data_kurir = Kurir::latest()->paginate(10);
        return view('kurir.index', compact('data_kurir'));
    }

    public function create()
    {
        return view('kurir.create');
    }
    
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'wilayah_operasi' => 'required|string|max:255',
        ]);

        Kurir::create($validated);

        return redirect()->route('kurir.index')->with(['success' => 'Data Kurir Berhasil Ditambahkan']);
    }

    public function destroy(string $id): RedirectResponse
    {
        $data_kurir = Kurir::findOrFail($id);
        $data_kurir->delete();

        return redirect()->route('kurir.index')->with(['success' => 'Data Kurir Berhasil Dihapus']);
    }

    public function show(string $id)
    {
        $data_kurir = Kurir::findOrFail($id);
        return view('kurir.show', compact('data_kurir'));
    }

    public function edit(string $id)
    {
        $data_kurir = Kurir::findOrFail($id);
        return view('kurir.edit', compact('data_kurir'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'wilayah_operasi' => 'required|string|max:255',
        ]);

        $data_kurir = Kurir::findOrFail($id);
        $data_kurir->update($validated);

        return redirect()->route('kurir.index')->with(['success' => 'Data Kurir Berhasil Diupdate']);
    }
}