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
        ]);

        // upload file baru jika ada
        if ($request->hasFile('image')) {
            $filename = time() . "_" . $request->image->getClientOriginalName();
            $request->image->move('assets/img/teams', $filename);
        }

        $team->title = $request->title;
        $team->description = $request->description;
        $team->save();

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
