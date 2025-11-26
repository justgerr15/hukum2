@extends('layout.master')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h3><b>TAMBAH TEAM</b></h3>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-body" style="margin-left: 20px;">

                    <form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Foto Team</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Nama / Jabatan</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="description" class="form-control" required></textarea>
                        </div>

                        <button class="btn btn-success">Simpan</button>
                        <a href="/team" class="btn btn-secondary">Kembali</a>

                    </form>

                </div>
            </div>

        </div>
    </section>

</div>
@endsection
