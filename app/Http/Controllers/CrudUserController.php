<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CrudUserController extends Controller
{
    // ============================================================
    // LIST DATA USER (KHUSUS SUPERADMIN)
    // ============================================================
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    // ============================================================
    // FORM TAMBAH USER
    // ============================================================
    public function create()
    {
        return view('user.create');
    }

    // ============================================================
    // SIMPAN USER BARU
    // ============================================================
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required',
            'email'  => 'required|email|unique:users,email',
            'role'   => 'required|in:superadmin,admin',
            'status' => 'required|in:verify,active',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name'   => $request->name,
            'email'  => $request->email,
            'role'   => $request->role,
            'status' => $request->status,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan');
    }

    // ============================================================
    // FORM EDIT USER (SUPERADMIN)
    // ============================================================
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit_admin', compact('user'));
    }

    // ============================================================
    // UPDATE DATA USER
    // ============================================================
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'   => 'required',
            'email'  => "required|email|unique:users,email,{$id}",
            'role'   => 'required|in:superadmin,admin',
            'status' => 'required|in:verify,active',
            'password' => 'nullable|min:6',
        ]);

        $user->name   = $request->name;
        $user->email  = $request->email;
        $user->role   = $request->role;
        $user->status = $request->status;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui');
    }

    // ============================================================
    // DELETE USER
    // ============================================================
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus');
    }

    // ============================================================
    // PROFILE (Dipakai user biasa)
    // ============================================================
    public function profile()
    {
        $user = auth()->user();
        return view('user.profile', compact('user'));
    }

    // ============================================================
    // UPDATE PROFILE USER SENDIRI
    // ============================================================
    public function profileUpdate(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required',
            'password' => 'nullable|min:6',
            'role' => 'nullable'
        ]);

        $user->name = $request->name;

        // Superadmin boleh ganti role
        if (auth()->user()->role === 'superadmin' && $request->role) {
            $user->role = $request->role;
        }

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui.');
    }
}
