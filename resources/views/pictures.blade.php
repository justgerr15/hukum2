@extends('layout.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h3><b>DATA GAMBAR</b></h3>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <a href="{{ route('pictures.create') }}" class="btn btn-success mb-3">+ Tambah Gambar</a>

            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table table-bordered text-center">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pictures as $i => $pic)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>
                                    <img src="{{ asset('assets/img/pictures/' . $pic->image) }}" width="120" style="border-radius:5px;">
                                </td>
                                <td>
                                    <a href="{{ route('pictures.edit', $pic->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('pictures.destroy', $pic->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus gambar ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection
