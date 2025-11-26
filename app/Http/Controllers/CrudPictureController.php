<?php

namespace App\Http\Controllers;

use App\Models\crudPicture;
use Illuminate\Http\Request;

class CrudPictureController extends Controller
{
    public function index()
    {
        $pictures = crudPicture::all();
        return view('/pictures', compact('pictures'));
    }

    public function create()
    {
        return view('pictures.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $filename = 'pictures';

        if ($request->hasFile('image')) {
            $filename = time() . "_" . $request->image->getClientOriginalName();
            $request->image->move('assets/img/pictures', $filename);
        }

        crudPicture::create(['image' => $filename]);

        return redirect('/pictures')->with('success', 'Gambar berhasil diupload!');
    }

    public function edit($id)
    {
        $picture = crudPicture::findOrFail($id);
        return view('pictures.edit', compact('picture'));
    }

    public function update(Request $request, $id)
    {
        $picture = crudPicture::findOrFail($id);

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/img/pictures'), $filename);
            $picture->image = 'assets/img/pictures/'.$filename;
        }

        $picture->save();

        return redirect('/pictures')->with('success', 'Gambar berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $picture = crudPicture::findOrFail($id);
        $picture->delete();

        return redirect('/pictures')->with('success', 'Gambar berhasil dihapus!');
    }
}
