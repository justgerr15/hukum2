@extends('layout.master')

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h3><b>EDIT KOPETENSI</b></h3>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-body" style="margin-left: 20px;">

                    <form action="{{ route('kopetensi.update', $data->id) }}" 
                          method="POST" 
                          enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Tipe</label>
                            <input type="text" name="type" 
                                   value="{{ $data->type }}" 
                                   class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="title" 
                                   value="{{ $data->title }}" 
                                   class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="description" 
                                      class="form-control" required>{{ $data->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Gambar Saat Ini</label><br>
                            <img src="{{ asset('assets/img/competence/' . $data->image) }}" 
                                 width="120" class="img-thumbnail">
                        </div>

                        <div class="form-group">
                            <label>Ganti Gambar (Opsional)</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <button class="btn btn-primary">Update</button>
                        <a href="/kopetensi" class="btn btn-secondary">Kembali</a>

                    </form>

                </div>
            </div>

        </div>
    </section>

</div>

@endsection
