@extends('layout.master')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h3><b>TAMBAH ALUMNI</b></h3>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card">
                <div class="card-body">

                    <form action="{{ route('alumni.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mt-2">
                            <label>Nama Alumni</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="form-group mt-2">
                            <label>Pekerjaan</label>
                            <input type="text" name="jobs" class="form-control" required>
                        </div>

                        <div class="form-group mt-2">
                            <label>Deskripsi</label>
                            <textarea name="description" class="form-control" rows="4" required></textarea>
                        </div>

                        <div class="form-group mt-2">
                            <label>Foto Alumni</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-success mt-3">Simpan</button>
                        <a href="{{ route('alumni.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                    </form>

                </div>
            </div>

        </div>
    </section>
</div>
@endsection
