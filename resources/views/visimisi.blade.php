@extends('layout.master')

@section('content')

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><b>Data Visi & Misi</b></h3>

                    <a href="{{ route('visi_misi.create') }}" class="btn btn-primary btn-sm float-right">
                        + Tambah Visi & Misi
                    </a>
                </div>

                <div class="card-body table-responsive">

                    <table class="table table-striped table-hover table-bordered">
                        <thead class="bg-gradient-primary text-white">
                            <tr>
                                <th style="width: 60px;">No</th>
                                <th>Judul</th>
                                <th>Isi</th>
                                <th style="width: 160px;">Created At</th>
                                <th style="width: 160px;">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        @if($data->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    <i class="fas fa-file-alt fa-2x mb-2"></i><br>
                                    Belum ada data Visi & Misi.
                                </td>
                            </tr>
                        @else
                            @foreach ($data as $i => $item)
                                <tr>
                                    <td class="align-middle">{{ $i + 1 }}</td>

                                    <td class="align-middle">
                                        <strong>{{ $item->judul }}</strong>
                                    </td>

                                    <td class="align-middle text-left">
                                        <div style="max-width: 400px; white-space: normal;">
                                            {{ $item->isi }}
                                        </div>
                                    </td>

                                    <td class="align-middle">{{ $item->created_at }}</td>

                                    <td class="align-middle">
                                        <a href="{{ route('visi_misi.edit', $item->id) }}"
                                           class="btn btn-warning btn-sm mb-1">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>

                                        <form action="{{ route('visi_misi.delete', $item->id) }}"
                                              method="POST"
                                              style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus?')">
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
