<?php

namespace App\Http\Controllers;

use App\Models\crudAlumni;
use Illuminate\Http\Request;

class CrudAlumniController extends Controller
{
    public function index()
    {
        $alumnis = crudAlumni::all();
        return view('alumni.index', compact('alumnis'));
    }

    public function create()
    {
        return view('alumni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'jobs' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        $filename = null;
                
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'assets/img/alumnis/' . time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/alumnis'), time() . '_' . $file->getClientOriginalName());
        }

            crudAlumni::create([
            'name' => $request->name,
            'jobs' => $request->jobs,
            'description' => $request->description,
            'image' => $filename,
        ]);

        return redirect()->route('alumni.index')->with('success', 'Alumni berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $alumni = crudAlumni::findOrFail($id);
        return view('alumni.edit', compact('alumni'));
    }

    public function update(Request $request, $id)
    {
        $alumni = crudAlumni::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'jobs' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

                if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = 'assets/img/alumnis/' . time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('assets/img/alumnis'), time() . '_' . $file->getClientOriginalName());
                $alumni->image = $filename;
            }

                $alumni->update([
                'name' => $request->name,
                'jobs' => $request->jobs,
                'description' => $request->description,
                'image' => $alumni->image
            ]);

        return redirect()->route('alumni.index')->with('success', 'Alumni berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $alumni = crudAlumni::findOrFail($id);

        // Hapus file gambar jika ada
        if ($alumni->image && file_exists(public_path($alumni->image))) {
            unlink(public_path($alumni->image));
        }

        $alumni->delete();

        return redirect()->route('alumni.index')->with('success', 'Alumni berhasil dihapus!');
    }
}
