@extends('layout.master')

@section('content')
<div class="container mt-4">
    <h2>Tambah Visi & Misi</h2>

    <a href="{{ route('visi_misi.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form action="{{ route('visi_misi.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ old('judul') }}">
        </div>

        <div class="form-group mt-3">
            <label>Isi</label>
            <textarea name="isi" id="isi" rows="10" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection


@section('scripts')
    <script src="{{ asset('assets/ckeditor5/ckeditor.js') }}"></script>
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


