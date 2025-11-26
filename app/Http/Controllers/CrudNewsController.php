<?php


namespace App\Http\Controllers;


use App\Models\CrudNews;
use Illuminate\Http\Request;


class CrudNewsController extends Controller
{
public function index()

{
$data = CrudNews::all();
return view('crud_news.index', compact('data'));
}


public function create()
{
return view('crud_news.create');
}


public function store(Request $request)
{
$request->validate([
'date' => 'required',
'image' => 'required|image|mimes:jpg,jpeg,png',
'title' => 'required',
'main' => 'required',
]);


$imageName = time() . '.' . $request->image->extension();
$request->image->move(public_path('uploads'), $imageName);


CrudNews::create([
'date' => $request->date,
'image' => $imageName,
'title' => $request->title,
'main' => $request->main,
]);


return redirect()->route('crud_news.index')->with('success', 'Data berhasil ditambahkan');
}


public function edit($id)
{
$row = CrudNews::findOrFail($id);
return view('crud_news.edit', compact('row'));
}


public function update(Request $request, $id)
{
$row = CrudNews::findOrFail($id);


$request->validate([
'date' => 'required',
'title' => 'required',
'main' => 'required',
]);


$imageName = $row->image;


if ($request->hasFile('image')) {
$request->validate(["image" => "image|mimes:jpg,jpeg,png"]);
$imageName = time() . '.' . $request->image->extension();
$request->image->move(public_path('uploads'), $imageName);
}


$row->update([
'date' => $request->date,
'image' => $imageName,
'title' => $request->title,
'main' => $request->main,
]);


return redirect()->route('crud_news.index')->with('success', 'Data berhasil diperbarui');
}


public function destroy($id)
{
$row = CrudNews::findOrFail($id);
$row->delete();
return redirect()->route('crud_news.index')->with('success', 'Data berhasil dihapus');
}
}