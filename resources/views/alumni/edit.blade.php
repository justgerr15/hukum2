@extends('layout.master')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h3><b>EDIT ALUMNI</b></h3>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card">
                <div class="card-body">

                    <form action="{{ route('alumni.update', $alumni->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mt-2">
                            <label>Nama Alumni</label>
                            <input type="text" name="name" class="form-control" value="{{ $alumni->name }}" required>
                        </div>

                        <div class="form-group mt-2">
                            <label>Pekerjaan</label>
                            <input type="text" name="jobs" class="form-control" value="{{ $alumni->jobs }}" required>
                        </div>

                        <div class="form-group mt-2">
                            <label>Deskripsi</label>
                            <textarea name="description" class="form-control" rows="4" required>{{ $alumni->description }}</textarea>
                        </div>

                        <div class="form-group mt-2">
                            <label>Foto Saat Ini</label><br>
                            @if($alumni->image)
                                <img src="{{ asset($alumni->image) }}" width="120" style="border-radius:5px;">
                            @else
                                <span class="text-muted">Belum ada foto</span>
                            @endif
                        </div>

                        <div class="form-group mt-2">
                            <label>Ganti Foto (Opsional)</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                        <a href="{{ route('alumni.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                    </form>

                </div>
            </div>

        </div>
    </section>
</div>
@endsection
