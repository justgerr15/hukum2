@extends('layout.master')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h3><b>DATA ALUMNI</b></h3>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <a href="{{ route('alumni.create') }}" class="btn btn-success mb-3">+ Tambah Alumni</a>

            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table table-bordered text-center">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Pekerjaan</th>
                                <th>Deskripsi</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($alumnis as $i => $alumni)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $alumni->name }}</td>
                                <td>{{ $alumni->jobs }}</td>
                                <td>{{ $alumni->description }}</td>
                                <td>
                                    @if($alumni->image)
                                        <img src="{{ asset($alumni->image) }}" width="80" style="border-radius:5px;">
                                    @else
                                        <span class="text-muted">Belum ada foto</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('alumni.edit', $alumni->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('alumni.destroy', $alumni->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus alumni ini?')">Hapus</button>
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
