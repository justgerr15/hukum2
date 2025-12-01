@extends('layout.master')

@section('content')
<div class="container mt-4">
    <h2>Edit Visi & Misi</h2>

    <a href="{{ route('visi_misi.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form action="{{ route('visi_misi.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $item->judul }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Isi</label>
            <textarea name="isi" id="isi" class="form-control" rows="6" required>{!! $item->isi !!}</textarea>
        </div>

        <button type="submit" class="btn btn-success mt-2">Update</button>
    </form>
</div>
@endsection

@section('scripts')
    <!-- Pastikan path ke ckeditor.js benar -->
    <script src="{{ asset('assets/ckeditor5/ckeditor5.js') }}"></script>

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
