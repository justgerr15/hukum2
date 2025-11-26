<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CrudKopetensi;

class CrudKopetensiController extends Controller
{
    public function index()
    {
        $data = CrudKopetensi::all();
        return view('kopetensi.index', compact('data'));
    }

    public function create()
    {
        return view('kopetensi.create');
    }

        public function store(Request $request)
{
    $request->validate([
        'type' => 'required',
        'title' => 'required',
        'description' => 'required',
        'image'       => 'nullable|mimes:jpg,jpeg,png,gif,svg,svg+xml|max:2048',
    ]);

    // -------------------------------------
    // 1. CARI ID YANG HILANG (GAP)
    // -------------------------------------
    $missingId = \DB::select("
        SELECT t1.id + 1 AS missing_id 
        FROM competences t1
        LEFT JOIN competences t2 ON t1.id + 1 = t2.id
        WHERE t2.id IS NULL
        ORDER BY t1.id
        LIMIT 1
    ");

    if (!empty($missingId) && $missingId[0]->missing_id != null) {
        $newId = $missingId[0]->missing_id;
    } else {
        // tidak ada ID hilang → pakai auto-increment terakhir
        $maxId = \DB::table('competences')->max('id');
        $newId = $maxId ? $maxId + 1 : 1;
    }

    // -------------------------------------
    // 2. PROSES UPLOAD GAMBAR
    // -------------------------------------
    $filename = 'teacher'; // default sesuai database

    if ($request->hasFile('image')) {
        $filename = time().'_'.$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('assets/img/competence'), $filename);
    }

    // -------------------------------------
    // 3. INSERT DATA DENGAN ID MANUAL
    // -------------------------------------
    CrudKopetensi::insert([
        'id' => $newId,
        'type' => $request->type,
        'title' => $request->title,
        'description' => $request->description,
         'image'       => $filename,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect('/kopetensi')->with('success', 'Data berhasil ditambahkan!');
}


    public function edit($id)
{
    $data = CrudKopetensi::findOrFail($id);
    return view('kopetensi.edit', compact('data'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'type'        => 'required',
        'title'       => 'required',
        'description' => 'required',
        'image'       => 'nullable|mimes:jpg,jpeg,png,gif,svg,svg+xml|max:2048',
    ]);

   $data = CrudKopetensi::findOrFail($id);
    $filename = $data->image; // gunakan gambar lama jika tidak diganti

    if ($request->hasFile('image')) {
        $filename = time() . "_" . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('assets/img/competence'), $filename);
    }

    $data->update([
        'type'        => $request->type,
        'title'       => $request->title,
        'description' => $request->description,
        'image'       => $filename,
    ]);

    return redirect('/kopetensi')->with('success', 'Data berhasil diupdate!');
}


    public function destroy($id)
    {
        $data = CrudKopetensi::findOrFail($id);
        $data->delete();

        return redirect('/kopetensi')->with('success', 'Data berhasil dihapus!');
    }
}
