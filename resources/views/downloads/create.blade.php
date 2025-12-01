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
                <h3 class="card-title"><b>Tambah File Download</b></h3>

                <a href="{{ route('downloads.index') }}" class="btn btn-secondary btn-sm float-right">
                    Kembali
                </a>
              </div>

              <div class="card-body">

                <form action="{{ route('downloads.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input 
                            type="text" 
                            name="name" 
                            class="form-control" 
                            placeholder="Masukkan nama file" 
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <input 
                            type="text" 
                            name="category" 
                            class="form-control" 
                            placeholder="Kategori file" 
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">File</label>
                        <input 
                            type="file" 
                            name="file" 
                            class="form-control" 
                            required>
                    </div>

                    <button class="btn btn-success">
                        <i class="fas fa-save"></i> Simpan
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
