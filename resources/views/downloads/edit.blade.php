@extends('layout.master')

@section('content')

<div class="content-wrapper">

    <!-- Content Header -->
    <div class="content-header">
      <div class="container-fluid">

        <div class="row">
          <div class="col-12">

            <div class="card shadow-sm">
              <div class="card-header">
                <h3 class="card-title"><b>Edit File Download</b></h3>

                <a href="{{ route('downloads.index') }}" class="btn btn-secondary btn-sm float-right">
                    Kembali
                </a>
              </div>

              <div class="card-body">

                <form action="{{ route('downloads.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input 
                            type="text" 
                            name="name" 
                            value="{{ $data->name }}" 
                            class="form-control" 
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <input 
                            type="text" 
                            name="category" 
                            value="{{ $data->category }}" 
                            class="form-control" 
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">File (Opsional)</label><br>
                        <small>
                            File sekarang: 
                            <a href="/{{ $data->link }}" target="_blank">Lihat / Download</a>
                        </small>
                        <input 
                            type="file" 
                            name="file" 
                            class="form-control mt-2">
                    </div>

                    <button class="btn btn-primary">
                        <i class="fas fa-save"></i> Update
                    </button>

                </form>

              </div>

            </div>

          </div>
        </div>

      </div>
    </div>

</div>

@endsection
