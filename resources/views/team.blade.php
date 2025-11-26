@extends('layout.master')

@section('content')

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><b>Data Dosen</b></h3>

                    <a href="{{ route('team.create') }}" class="btn btn-primary btn-sm float-right">
                        + Tambah Team
                    </a>
                </div>

                <div class="card-body table-responsive">

                    <table class="table table-striped table-hover table-bordered">
    <thead class="bg-gradient-primary text-white">
        <tr>
            <th style="width: 60px;">No</th>
            <th style="width: 120px;">Foto</th>
            <th>Nama Dosen</th>
            <th>Jabatan</th>
            <th style="width: 160px;">Action</th>
        </tr>
    </thead>

    <tbody>
    @if($teams->isEmpty())
        <tr>
            <td colspan="5" class="text-center text-muted py-4">
                <i class="fas fa-users fa-2x mb-2"></i><br>
                Belum ada data team.
            </td>
        </tr>
    @else 
        @foreach ($teams as $i => $t)
            <tr>
                <td class="align-middle">{{ $i + 1 }}</td>

                <td class="align-middle">
                    <img src="{{ asset('assets/img/teams/' . $t->image) }}"
                         class="img-fluid rounded shadow-sm"
                         style="width: 90px; height: 90px; object-fit: cover;">
                </td>

                <td class="align-middle">
                    <strong>{{ $t->title }}</strong>
                </td>

                <td class="align-middle text-left">
                    <div style="max-width: 350px; white-space: normal;">
                        {{ $t->description }}
                    </div>
                </td>

                <td class="align-middle">
                    <a href="{{ route('team.edit', $t->id) }}"
                       class="btn btn-warning btn-sm mb-1">
                        <i class="fas fa-edit"></i> Edit
                    </a>

                    <form action="{{ route('team.destroy', $t->id) }}"
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
