@extends('layout.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h3><b>TAMBAH GAMBAR</b></h3>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card">
                <div class="card-body">

                    <form action="{{ route('pictures.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Upload Gambar</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-success mt-3">Simpan</button>
                        <a href="{{ route('pictures.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                    </form>

                </div>
            </div>

        </div>
    </section>
</div>
@endsection
