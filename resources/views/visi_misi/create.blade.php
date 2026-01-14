@extends('layout.master')

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h3><b>TAMBAH VISI & MISI</b></h3>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card shadow-sm">
                <div class="card-body px-4 py-4">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('visi_misi.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label><b>Judul</b></label>
                            <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label><b>Isi</b></label>
                            <textarea name="isi" id="isi" rows="6" class="form-control"></textarea>
                        </div>

                        <button class="btn btn-success">Simpan</button>
                        <a href="{{ route('visi_misi.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>

                </div>
            </div>

        </div>
    </section>

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
        .then(editor => console.log('Editor siap:', editor))
        .catch(error => console.error('Kesalahan:', error));
});
</script>
@endsection
