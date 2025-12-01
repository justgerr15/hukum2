@extends('layout.master')

@section('content')

<div class="content-wrapper">

    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">

            <div class="row justify-content-center">
                <div class="col-md-8">

                    <div class="card shadow">
                        <div class="card-header bg-primary text-white">
                            <h4 class="mb-0">Tambah Berita</h4>
                        </div>

                        <div class="card-body">

                            <form action="{{ route('crud_news.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                {{-- TANGGAL --}}
                                <div class="mb-3">
                                    <label class="form-label">Date</label>
                                    <input type="date" name="date" class="form-control" required>
                                </div>

                                {{-- GAMBAR --}}
                                <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <input type="file" name="image" class="form-control" required>
                                </div>

                                {{-- TITLE --}}
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" required>
                                </div>

                                {{-- MAIN CONTENT --}}
                                <div class="mb-3">
                                    <label class="form-label">Main</label>
                                    <textarea name="main" id="isi" class="form-control" rows="5" required></textarea>
                                </div>

                                <button class="btn btn-success w-100">Simpan</button>

                            </form>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

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
        .then(editor => console.log('Editor siap:', editor))
        .catch(error => console.error('Terjadi kesalahan:', error));
});
</script>
@endsection
