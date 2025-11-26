@extends('layout.master')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid ml-4">
            <h3><b>EDIT TEAM</b></h3>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card col-md-8 offset-md-1 p-4">
                <div class="card-body">

                    <form action="{{ route('team.update', $team->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Image Lama</label><br>
                            <img src="{{ asset('assets/img/teams/' . $team->image) }}" width="150" style="border-radius:5px;">
                        </div>

                        <div class="form-group mt-3">
                            <label>Ganti Image (Opsional)</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="form-group mt-3">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $team->title }}" required>
                        </div>

                        <div class="form-group mt-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="4" required>{{ $team->description }}</textarea>
                        </div>

                        <button class="btn btn-primary mt-3">Update</button>
                        <a href="{{ route('/team') }}" class="btn btn-secondary mt-3">Kembali</a>

                    </form>

                </div>
            </div>

        </div>
    </section>
</div>

@endsection
