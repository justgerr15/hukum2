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
                <h3 class="card-title"><b>DATA FASILITAS</b></h3>

                <a href="{{ route('facilities.create') }}" class="btn btn-primary btn-sm float-right">
                    + Tambah Fasilitas
                </a>
              </div>

              <div class="card-body table-responsive">
                <table id="example2" class="table table-bordered table-hover text-center">

                  <thead class="bg-primary text-white">
                    <tr>
                      <th>No</th>
                      <th>Type</th>
                      <th>Image</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th width="150px">Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach ($data as $i => $item)
                    <tr>
                      <td>{{ $i + 1 }}</td>
                      <td>{{ $item->type }}</td>

                      <td>
                        <img src="{{ asset('assets/img/facilities/' . $item->image) }}" 
                             width="90" 
                             class="img-thumbnail">
                      </td>

                      <td>{{ $item->title }}</td>
                      <td>{{ $item->description }}</td>

                      <td>

                        <a href="{{ route('facilities.edit', $item->id) }}" 
                           class="btn btn-warning btn-sm">
                           <i class="fas fa-edit"></i> Edit
                        </a>

                        <form action="{{ route('facilities.destroy', $item->id) }}" 
                              method="POST" 
                              style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus fasilitas ini?')">
                                <i class="fas fa-trash"></i> Hapus
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
