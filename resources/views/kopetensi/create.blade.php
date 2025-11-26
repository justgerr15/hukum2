@extends('layout.master')

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h3><b>TAMBAH KOPETENSI</b></h3>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-body" style="margin-left: 20px; margin-right:20px;">

                    <form action="{{ route('kopetensi.store') }}" 
                          method="POST" 
                          enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Tipe</label>
                            <input type="text" name="type" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="description" class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <label>Gambar Kompetensi</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <button class="btn btn-success">Simpan</button>
                        <a href="/kopetensi" class="btn btn-secondary">Kembali</a>

                    </form>

                </div>
            </div>

        </div>
    </section>

</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@endsection
