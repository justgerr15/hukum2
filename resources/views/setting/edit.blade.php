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
                <h3 class="card-title"><b>Edit Website Setting</b></h3>

                <a href="{{ route('setting.index') }}" 
                   class="btn btn-secondary btn-sm float-right">
                    Kembali
                </a>
              </div>

              <div class="card-body">

                <form action="{{ route('setting.update', $setting->id) }}" 
                      method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label><b>Name</b></label>
                        <input type="text" 
                               name="name" 
                               class="form-control" 
                               value="{{ $setting->name }}" 
                               required>
                    </div>

                    <div class="form-group mb-3">
                        <label><b>Address</b></label>
                        <textarea name="address" 
                                  class="form-control" 
                                  rows="3" 
                                  required>{{ $setting->address }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label><b>Email</b></label>
                        <input type="email" 
                               name="email" 
                               class="form-control" 
                               value="{{ $setting->email }}" 
                               required>
                    </div>

                    <div class="form-group mb-3">
                        <label><b>Favicon</b></label>
                        <input type="file" 
                               name="favicon" 
                               class="form-control">

                        @if($setting->favicon)
                            <img src="{{ asset('upload/setting/'.$setting->favicon) }}" 
                                 width="50" 
                                 class="img-thumbnail mt-2">
                        @else
                            <p class="text-muted mt-1">Belum ada favicon</p>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <label><b>Logo</b></label>
                        <input type="file" 
                               name="logo" 
                               class="form-control">

                        @if($setting->logo)
                            <img src="{{ asset('upload/setting/'.$setting->logo) }}" 
                                 width="120" 
                                 class="img-thumbnail mt-2">
                        @else
                            <p class="text-muted mt-1">Belum ada logo</p>
                        @endif
                    </div>

                    <button class="btn btn-success mt-2">Update</button>
                </form>

              </div>

            </div>

          </div>
        </div>

      </div>
    </div>

</div>

@endsection
