@extends('layout.master')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid ml-4">
            <h3><b>EDIT SLIDER</b></h3>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card col-md-8 offset-md-1 p-4">
                <div class="card-body">

                    <form action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Mini Title</label>
                            <input type="text" name="head" class="form-control" value="{{ $slider->head }}" required>
                        </div>

                        <div class="form-group">
                            <label>Main Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $slider->title }}" required>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" required>{{ $slider->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Button 1</label>
                            <input type="text" name="button1" class="form-control" value="{{ $slider->button1 }}" required>
                        </div>

                        <div class="form-group">
                            <label>Link Button 1</label>
                            <input type="text" name="link1" class="form-control" value="{{ $slider->link1 }}" required>
                        </div>

                        <div class="form-group">
                            <label>Button 2</label>
                            <input type="text" name="button2" class="form-control" value="{{ $slider->button2 }}" required>
                        </div>

                        <div class="form-group">
                            <label>Link Button 2</label>
                            <input type="text" name="link2" class="form-control" value="{{ $slider->link2 }}" required>
                        </div>

                        <div class="form-group">
                            <label>Gambar Sekarang</label><br>
                            <img src="{{ asset($slider->img) }}" width="200" style="border-radius:5px;">
                        </div>

                        <div class="form-group">
                            <label>Upload Gambar Baru (Opsional)</label>
                            <input type="file" name="img" class="form-control">
                        </div>

                        <button class="btn btn-primary">Update</button>
                        <a href="/slider" class="btn btn-secondary">Kembali</a>

                    </form>

                </div>
            </div>

        </div>
    </section>
</div>

@endsection
