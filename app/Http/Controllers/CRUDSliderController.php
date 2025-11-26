<?php

namespace App\Http\Controllers;

use App\Models\CrudSlider;
use Illuminate\Http\Request;

class CRUDSliderController extends Controller
{
    // =====================
    // INDEX - Tampilkan semua slider
    // =====================
    public function index()
    {
        $sliders = CrudSlider::all();
        return view('slider.index', compact('sliders'));
    }

    // =====================
    // CREATE - Form tambah slider
    // =====================
    public function create()
    {
        return view('slider.create');
    }

    // =====================
    // STORE - Simpan slider baru
    // =====================
    public function store(Request $request)
    {
        $request->validate([
            'head' => 'required',
            'title' => 'required',
            'description' => 'required',
            'button1' => 'required',
            'link1' => 'required',
            'button2' => 'required',
            'link2' => 'required',
            'img' => 'required|image|mimes:jpg,jpeg,png,svg|max:3048',
        ]);

        // Upload gambar
        $filename = null;
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/sliders'), $filename);
        }

        // Simpan ke database
        CrudSlider::create([
            'head' => $request->head,
            'title' => $request->title,
            'description' => $request->description,
            'button1' => $request->button1,
            'link1' => $request->link1,
            'button2' => $request->button2,
            'link2' => $request->link2,
            'img' => $filename,
        ]);

        return redirect('/slider')->with('success', 'Slider berhasil ditambahkan.');
    }

    // =====================
    // EDIT - Form edit slider
    // =====================
    public function edit($id)
    {
        $slider = CrudSlider::findOrFail($id);
        return view('slider.edit', compact('slider'));
    }

    // =====================
    // UPDATE - Perbarui slider
    // =====================
    public function update(Request $request, $id)
    {
        $request->validate([
            'head' => 'required',
            'title' => 'required',
            'description' => 'required',
            'button1' => 'required',
            'link1' => 'required',
            'button2' => 'required',
            'link2' => 'required',
            'img' => 'image|mimes:jpg,jpeg,png,svg|max:3048',
        ]);

        $slider = CrudSlider::findOrFail($id);

        // Upload gambar baru jika ada
        if ($request->hasFile('img')) {
            // Hapus gambar lama
            $oldPath = public_path('assets/img/sliders/' . $slider->img);
            if ($slider->img && file_exists($oldPath)) {
                unlink($oldPath);
            }

            // Upload gambar baru
            $file = $request->file('img');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/sliders'), $filename);
            $slider->img = $filename; // update nama file
        }

        // Update data slider
        $slider->update([
            'head' => $request->head,
            'title' => $request->title,
            'description' => $request->description,
            'button1' => $request->button1,
            'link1' => $request->link1,
            'button2' => $request->button2,
            'link2' => $request->link2,
            'img' => $slider->img, // tetap nama file terbaru
        ]);

        return redirect('/slider')->with('success', 'Slider berhasil diperbarui.');
    }

    // =====================
    // DESTROY - Hapus slider
    // =====================
    public function destroy($id)
    {
        $slider = CrudSlider::findOrFail($id);

        // Hapus file gambar
        $filePath = public_path('assets/img/sliders/' . $slider->img);
        if ($slider->img && file_exists($filePath)) {
            unlink($filePath);
        }

        $slider->delete();

        return redirect('/slider')->with('success', 'Slider berhasil dihapus.');
    }
}
