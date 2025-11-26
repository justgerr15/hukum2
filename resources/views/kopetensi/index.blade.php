@extends('layout.master')

@section('content')
<div class="container">
    <h3>Data Kopetensi</h3>

    <a href="{{ route('kopetensi.create') }}" class="btn btn-primary mb-3">Tambah Data</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tipe</th>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $d)
            <tr>
                <td>{{ $d->type }}</td>
                <td><img src="/assets/img/competence/{{ $d->image }}" width="80"></td>
                <td>{{ $d->title }}</td>
                <td>{{ $d->description }}</td>
                <td>
                    <a href="{{ route('kopetensi.edit', $d->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('kopetensi.destroy', $d->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
