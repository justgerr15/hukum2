@extends('layout.master')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h3><b>TAMBAH SLIDER</b></h3>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-body" style="margin-left: 20px;">

                    <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Mini Title</label>
                            <input type="text" name="head" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Main Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <label>Button 1</label>
                            <input type="text" name="button1" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Link Button 1</label>
                            <input type="text" name="link1" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Button 2</label>
                            <input type="text" name="button2" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Link Button 2</label>
                            <input type="text" name="link2" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Gambar Slider (Gambar harus berukuran 1920x1280)</label>
                            <input type="file" name="img" class="form-control" required>
                        </div>

                        <button class="btn btn-success">Simpan</button>
                        <a href="/slider" class="btn btn-secondary">Kembali</a>

                    </form>

                </div>
            </div>

        </div>
    </section>
</div>

@endsection
