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
        <label for="judul">Judul</label>
        <input type="text" name="judul" class="form-control" id="judul" value="{{ old('judul') }}">
    </div>

    <div class="form-group">
        <label for="isi">Isi</label>
        <textarea name="isi" id="isi" class="form-control">{{ old('isi') }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

</div>
@endsection

@section('scripts')
<!-- CKEditor CDN -->
<!-- CKEditor 5 Classic -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
