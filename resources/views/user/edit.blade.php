@extends('layout.master')

@section('content')

<div class="container col-md-5 mx-auto py-5">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card p-4 shadow">
        <h4 class="mb-3 text-center">Edit Profil</h4>

        <form action="{{ route('user.profile.update') }}" method="POST">
            @csrf

            {{-- NAMA --}}
            <div class="form-group mb-3">
                <label>Nama Lengkap</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
            </div>

            {{-- ROLE (Hanya Superadmin Yang Bisa Edit) --}}
            @if(auth()->user()->role === 'superadmin')
            <div class="form-group mb-3">
                <label>Role Pengguna</label>
                <select name="role" class="form-control">
                    <option value="superadmin" {{ $user->role == 'superadmin' ? 'selected' : '' }}>Superadmin</option>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>
            @else
                <input type="hidden" name="role" value="{{ $user->role }}">
            @endif

            {{-- PASSWORD --}}
            <div class="form-group mb-3">
                <label>Password Baru (Opsional)</label>
                <input type="password" name="password" class="form-control" placeholder="Isi jika ingin mengganti password">
            </div>

            <button type="submit" class="btn btn-primary w-100">Update Profil</button>
        </form>
    </div>
</div>

@endsection
