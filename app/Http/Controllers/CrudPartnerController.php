<?php

namespace App\Http\Controllers;

use App\Models\crudPartner;
use Illuminate\Http\Request;

class CrudPartnerController extends Controller
{
    public function index()
    {
        $partners = crudPartner::all();
        return view('partner.index', compact('partners'));
    }

    public function create()
    {
        return view('partner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        $filename = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'assets/img/partners/' . time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/partners'), time() . '_' . $file->getClientOriginalName());
        }

        crudPartner::create([
            'image' => $filename,
        ]);

        return redirect()->route('partner.index')->with('success', 'Partner berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $partner = crudPartner::findOrFail($id);
        return view('partner.edit', compact('partner'));
    }

    public function update(Request $request, $id)
    {
        $partner = crudPartner::findOrFail($id);

        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($partner->image && file_exists(public_path($partner->image))) {
                unlink(public_path($partner->image));
            }

            $file = $request->file('image');
            $filename = 'assets/img/partners/' . time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/partners'), time() . '_' . $file->getClientOriginalName());
            $partner->image = $filename;
        }

        $partner->update([
            'image' => $partner->image,
        ]);

        return redirect()->route('partner.index')->with('success', 'Partner berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $partner = crudPartner::findOrFail($id);

        if ($partner->image && file_exists(public_path($partner->image))) {
            unlink(public_path($partner->image));
        }

        $partner->delete();

        return redirect()->route('partner.index')->with('success', 'Partner berhasil dihapus!');
    }
}
