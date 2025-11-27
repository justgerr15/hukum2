<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class CrudTeamController extends Controller
{
    public function index()
    {
        $teams = team::all();
        return view('/team', compact('teams'));
    }

    public function create()
    {
        return view('team.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg',
            'title' => 'required',
            'description' => 'required',
        ]);

        $filename = 'team';

        if ($request->hasFile('image')) {
            $filename = time() . "_" . $request->image->getClientOriginalName();
            $request->image->move('assets/img/teams', $filename);
        }

            Team::create([
            'type' => $request->type,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $filename,
        ]);

        return redirect('/team')->with('success', 'Team berhasil ditambahkan');
    }

    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('team.edit', compact('team'));
    }

    public function update(Request $request, $id)
{
    $team = Team::findOrFail($id);

    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'image' => 'image|mimes:jpg,png,jpeg'
    ]);

    // Default: gunakan gambar lama
    $filename = $team->image;

    // Jika upload gambar baru
    if ($request->hasFile('image')) {

        // Hapus gambar lama
        $oldFile = public_path('assets/img/teams/' . $team->image);
        if (file_exists($oldFile)) {
            unlink($oldFile);
        }

        // Upload gambar baru
        $filename = time() . "_" . $request->image->getClientOriginalName();
        $request->image->move('assets/img/teams', $filename);
    }

    // Simpan perubahan
    $team->update([
        'title' => $request->title,
        'description' => $request->description,
        'image' => $filename,
    ]);

    return redirect('/team')->with('success', 'Data berhasil diperbarui');
}

    public function destroy($id)
    {
        $team = Team::findOrFail($id);

        if (file_exists($team->image)) {
            @unlink($team->image);
        }

        $team->delete();

        return redirect('/team')->with('success', 'Data berhasil dihapus');
    }
}
