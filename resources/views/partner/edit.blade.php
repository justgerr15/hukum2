@extends('layout.master')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h3><b>EDIT PARTNER</b></h3>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-body" style="margin-left: 20px;">

                    <form action="{{ route('partner.update', $partner->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Gambar Sekarang</label><br>
                            <img src="{{ asset($partner->image) }}" width="200" style="border-radius:5px;">
                        </div>

                        <div class="form-group mt-2">
                            <label>Upload Gambar Baru (Opsional)</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <button class="btn btn-primary mt-3">Update</button>
                        <a href="{{ route('partner.index') }}" class="btn btn-secondary mt-3">Kembali</a>

                    </form>

                </div>
            </div>

        </div>
    </section>

</div>
@endsection
