@extends('layout.master')
@section('content')
<div class="container mt-4">
<h3>Tambah Berita</h3>


<form action="{{ route('crud_news.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="mb-3">
<label>Date</label>
<input type="date" name="date" class="form-control" required>
</div>
<div class="mb-3">
<label>Image</label>
<input type="file" name="image" class="form-control" required>
</div>
<div class="mb-3">
<label>Title</label>
<input type="text" name="title" class="form-control" required>
</div>
<div class="mb-3">
<label>Main</label>
<textarea name="main" class="form-control" rows="5" required></textarea>
</div>
<button class="btn btn-success">Simpan</button>
</form>
</div>
@endsection