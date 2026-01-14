@extends('layout.master')

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h3><b>EDIT VISI & MISI</b></h3>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card shadow-sm">
                <div class="card-body px-4 py-4">

                    <a href="{{ route('visi_misi.index') }}" class="btn btn-secondary mb-3">Kembali</a>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('visi_misi.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label><b>Judul</b></label>
                            <input type="text" name="judul" class="form-control" value="{{ $item->judul }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label><b>Isi</b></label>
                            <textarea name="isi" id="isi" class="form-control" rows="6" required>{!! $item->isi !!}</textarea>
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>
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
