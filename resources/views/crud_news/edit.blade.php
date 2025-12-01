@extends('layout.master')
@section('content')
<div class="container mt-4">
    <h3>Edit Berita</h3>

    <form action="{{ route('crud_news.update', $row->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" value="{{ $row->date }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Image</label><br>
            <img src="/uploads/{{ $row->image }}" width="100" class="mb-2"><br>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" value="{{ $row->title }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Main</label>
            <textarea name="main" id="isi" class="form-control" rows="5" required>{{ $row->main }}</textarea>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

@section('scripts')
<!-- Memuat CKEditor 5 Classic Build -->
<script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    ClassicEditor
        .create(document.querySelector('#isi'), {
            toolbar: [
                'heading', '|',
                'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
                'alignment',
                'undo', 'redo'
            ],
            alignment: {
                options: [ 'left', 'center', 'right', 'justify' ]
            }
        })
        .then(editor => {
            console.log('Editor siap:', editor);
        })
        .catch(error => console.error('Terjadi kesalahan:', error));
});
</script>
@endsection
