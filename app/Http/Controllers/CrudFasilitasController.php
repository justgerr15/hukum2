<?php

namespace App\Http\Controllers;

use App\Models\crudFasilitas;
use Illuminate\Http\Request;

class CrudFasilitasController extends Controller
{
    public function index()
    {
        $data = crudFasilitas::all();
        return view('/facilities', compact('data'));
    }

    public function create()
    {
        return view('facilities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $filename = 'facilities';

        if ($request->hasFile('image')) {
            $filename = time() . "_" . $request->image->getClientOriginalName();
            $request->image->move('assets/img/facilities', $filename);
        }

        crudFasilitas::create([
            'type' => $request->type,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $filename,
        ]);

        return redirect('/facilities')->with('success', 'Fasilitas berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = crudFasilitas::findOrFail($id);
        return view('facilities.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = crudFasilitas::findOrFail($id);

        $request->validate([
            'type' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png|max:3048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/img/facilities'), $filename);
            $data->image = 'assets/img/facilities/'.$filename;
        }

        $data->update([
            'type' => $request->type,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $data->image,
        ]);

        return redirect('/facilities')->with('success', 'Data fasilitas berhasil diperbarui');
    }

    public function destroy($id)
    {
        $data = crudFasilitas::findOrFail($id);
        $data->delete();

        return redirect('/facilities')->with('success', 'Data fasilitas berhasil dihapus');
    }
}
