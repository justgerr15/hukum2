<?php

namespace App\Http\Controllers;

use App\Models\setting;
use App\Models\crudDownload;
use Illuminate\Http\Request;

class CrudDownloadController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $data = crudDownload::when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('category', 'like', "%{$search}%");
            })
            ->latest()
            ->get();

        $title = "Download";
        $setting = Setting::all();

        return view('downloads.index', compact('data', 'search', 'setting', 'title'));
    }

    public function create()
    {
        return view('downloads.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'category' => 'required',
            'file'     => 'required|mimes:pdf,doc,docx,xlsx,png,jpg,zip',
        ]);

        $file = $request->file('file');
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('assets/documents'), $filename);

        crudDownload::create([
            'name'     => $request->name,
            'category' => $request->category,
            'link'     => 'assets/documents/'.$filename
        ]);

        return redirect()->route('downloads.index')
                         ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = CrudDownload::findOrFail($id);
        return view('downloads.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = CrudDownload::findOrFail($id);

        $request->validate([
            'name'     => 'required',
            'category' => 'required',
            'file'     => 'mimes:pdf,doc,docx,xlsx,png,jpg,zip'
        ]);

        $link = $data->link;

        if ($request->hasFile('file')) {
            // hapus file lama jika ada
            if (file_exists(public_path($data->link))) {
                @unlink(public_path($data->link));
            }

            $file = $request->file('file');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/documents'), $filename);
            $link = 'assets/documents/'.$filename;
        }

        $data->update([
            'name'     => $request->name,
            'category' => $request->category,
            'link'     => $link
        ]);

        return redirect()->route('downloads.index')
                         ->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $data = CrudDownload::findOrFail($id);

        // hapus file jika ada
        if (file_exists(public_path($data->link))) {
            @unlink(public_path($data->link));
        }

        $data->delete();

        return redirect()->route('downloads.index')
                         ->with('success', 'Data berhasil dihapus');
    }
}
