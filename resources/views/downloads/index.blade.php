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
                <h3 class="card-title"><b>DOWNLOADS</b></h3>

                <a href="{{ route('downloads.create') }}" class="btn btn-primary btn-sm float-right">
                    + Tambah File
                </a>
              </div>

              <div class="card-body">

                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Category</th>
                      <th>File</th>
                      <th width="150px">Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach ($data as $row)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $row->name }}</td>
                      <td>{{ $row->category }}</td>

                      <td>
                        <a href="/{{ $row->link }}" target="_blank" class="btn btn-info btn-sm">
                            Download
                        </a>
                      </td>

                      <td>
                        <a href="{{ route('downloads.edit', $row->id) }}" 
                           class="btn btn-warning btn-sm">
                           Edit
                        </a>

                        <form action="{{ route('downloads.delete', $row->id) }}" 
                              method="POST" 
                              style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus file ini?')">
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
