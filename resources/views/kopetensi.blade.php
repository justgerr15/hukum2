@extends('layout.master')

@section('content')

<div class="content-wrapper">

    <!-- Content Header -->
    <div class="content-header">
      <div class="container-fluid">

        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>KOPETENSI</b></h3>

                <a href="{{ route('kopetensi.create') }}" class="btn btn-primary btn-sm float-right">
                    + Tambah Data
                </a>
              </div>

              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">

                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tipe</th>
                      <th>Gambar</th>
                      <th>Judul</th>
                      <th>Deskripsi</th>
                      <th width="150px">Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach ($kopetensi as $row)
                    <tr>
                      <td>{{ $row->id }}</td>
                      <td>{{ $row->type }}</td>

                      <td>
                        <img src="{{ asset('assets/img/competence/' . $row->image) }}" 
                             width="80" class="img-thumbnail">
                      </td>

                      <td>{{ $row->title }}</td>
                      <td>{{ $row->description }}</td>

                      <td>
                        <a href="{{ route('kopetensi.edit', $row->id) }}" 
                           class="btn btn-warning btn-sm">
                           Edit
                        </a>

                        <form action="{{ route('kopetensi.destroy', $row->id) }}" 
                              method="POST" 
                              style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus data ini?')">
                                Hapus
                            </button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

            </div>

          </div>
        </div>

      </div>
    </div>

</div>

@endsection
