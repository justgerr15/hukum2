@extends('layout.master')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h3><b>TAMBAH FASILITAS</b></h3>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card">
                <div class="card-body" style="margin-left: 20px;">

                    <form action="{{ route('facilities.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Image Fasilitas (gambar harus berukuran 600x400px)</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>

                        <div class="form-group mt-2">
                            <label>Type</label>
                            <select name="type" class="form-control" required>
                                <option value="">-- Pilih Type --</option>
                                <option value="Fasilitas">Fasilitas</option>
                                <option value="Layanan">Layanan</option>
                            </select>
                        </div>

                        <div class="form-group mt-2">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <div class="form-group mt-2">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="4" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-success mt-3">Simpan</button>
                        <a href="/facilities" class="btn btn-secondary mt-3">Kembali</a>

                    </form>

                </div>
            </div>

        </div>
    </section>

</div>
@endsection
