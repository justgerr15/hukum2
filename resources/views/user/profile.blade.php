@extends('layout.master')

@section('content')

<div class="container col-md-5 mx-auto py-5">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card p-4 shadow">
        <h4 class="mb-3 text-center">Edit Profil Saya</h4>

        <form action="{{ route('user.profile.update') }}" method="POST">
            @csrf

            {{-- NAMA --}}
            <div class="form-group mb-3">
                <label>Nama Lengkap</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
            </div>

            {{-- EMAIL (read only) --}}
            <div class="form-group mb-3">
                <label>Email</label>
                <input type="email" class="form-control" value="{{ $user->email }}" readonly>
            </div>

            {{-- ROLE (read only) --}}
            <div class="form-group mb-3">
                <label>Role</label>
                <input type="text" class="form-control" value="{{ $user->role }}" readonly>
            </div>

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
