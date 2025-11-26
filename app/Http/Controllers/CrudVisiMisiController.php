<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\crudVisiMisi;

class CrudVisiMisiController extends Controller
{
    public function index()
    {
        $data = crudVisiMisi::all();
        return view('visi_misi.index', compact('data'));
    }

    public function create()
    {
        return view('visi_misi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);

        crudVisiMisi::create($request->all());
        return redirect()->route('visi_misi.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $item = crudVisiMisi::findOrFail($id);
        return view('visi_misi.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);

        $item = crudVisiMisi::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('visi_misi.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $item = crudVisiMisi::findOrFail($id);
        $item->delete();
        return redirect()->route('visi_misi.index')->with('success', 'Data berhasil dihapus');
    }
}
