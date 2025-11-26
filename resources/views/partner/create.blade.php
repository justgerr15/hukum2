@extends('layout.master')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h3><b>TAMBAH PARTNER</b></h3>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-body" style="margin-left: 20px;">

                    <form action="{{ route('partner.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Upload Gambar Partner</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>

                        <button class="btn btn-success mt-3">Simpan</button>
                        <a href="{{ route('partner.index') }}" class="btn btn-secondary mt-3">Kembali</a>

                    </form>

                </div>
            </div>

        </div>
    </section>

</div>
@endsection
