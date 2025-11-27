@extends('layout.master')

@section('content')

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><b>Data Berita</b></h3>

                    <a href="{{ route('crud_news.create') }}" class="btn btn-primary btn-sm float-right">
                        + Tambah Berita
                    </a>
                </div>

                <div class="card-body table-responsive">

                    {{-- Alert sukses --}}
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-striped table-hover table-bordered">
                        <thead class="bg-gradient-primary text-white">
                            <tr>
                                <th style="width: 60px;">No</th>
                                <th style="width: 120px;">Tanggal</th>
                                <th style="width: 120px;">Gambar</th>
                                <th>Judul</th>
                                <th>Isi Utama</th>
                                <th style="width: 160px;">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if($data->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">
                                        <i class="fas fa-newspaper fa-2x mb-2"></i><br>
                                        Belum ada data berita.
                                    </td>
                                </tr>
                            @else
                                @foreach($data as $i => $d)
                                    <tr>
                                        <td class="align-middle">{{ $i + 1 }}</td>

                                        <td class="align-middle">
                                            {{ $d->date }}
                                        </td>

                                        <td class="align-middle">
                                            <img src="assets/img/news/{{ $d->image }}"
                                                 class="img-fluid rounded shadow-sm"
                                                 style="width: 90px; height: 90px; object-fit: cover;">
                                        </td>

                                        <td class="align-middle">
                                            <strong>{{ $d->title }}</strong>
                                        </td>

                                        <td class="align-middle text-left">
                                            <div style="max-width: 350px; white-space: normal;">
                                                {{ Str::limit($d->main, 100) }}
                                            </div>
                                        </td>

                                        <td class="align-middle">
                                            <a href="{{ route('crud_news.edit', $d->id) }}"
                                               class="btn btn-warning btn-sm mb-1">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>

                                            <form action="{{ route('crud_news.destroy', $d->id) }}"
                                                  method="POST"
                                                  style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Yakin ingin menghapus berita ini?')">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>

                    </table>

                </div>
            </div>

        </div>
    </div>

</div>

@endsection
