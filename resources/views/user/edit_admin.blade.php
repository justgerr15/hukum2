@extends('layout.master')

@section('content')

<div class="container col-md-6 mx-auto py-5">

    <div class="card p-4 shadow">

        <h4 class="mb-3 text-center">Edit User</h4>

        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

		@if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- NAMA --}}
            <div class="form-group mb-3">
                <label>Nama Lengkap</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
            </div>

            {{-- EMAIL --}}
            <div class="form-group mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
            </div>

            {{-- ROLE --}}
            <div class="form-group mb-3">
                <label>Role</label>
                <select name="role" class="form-control">
                    <option value="admin"      {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="superadmin" {{ $user->role == 'superadmin' ? 'selected' : '' }}>Superadmin</option>
                    <option value="user"       {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                </select>
            </div>

            {{-- PASSWORD --}}
            <div class="form-group mb-3">
                <label>Password Baru (Opsional)</label>
                <input type="password" name="password" class="form-control" placeholder="Isi jika ingin mengganti password">
            </div>

	    {{-- STATUS --}}
            <div class="form-group mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="verify" {{ $user->status == 'verify' ? 'selected' : '' }}>Verify</option>
                    <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Active</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100 mb-3">Update User</button>

            {{-- Tombol Kembali (Bawah) --}}
            <a href="{{ route('user.index') }}" class="btn btn-secondary w-100">
                ← Kembali
            </a>

        </form>
    </div>

</div>

@endsection
