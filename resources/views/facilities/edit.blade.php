@extends('layout.master')

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h3><b>EDIT FASILITAS</b></h3>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-body" style="margin-left: 20px;">

                    <form action="{{ route('facilities.update', $data->id) }}" 
                          method="POST" 
                          enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Type</label>
                            <input type="text" name="type" 
                                   value="{{ $data->type }}" 
                                   class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" 
                                   value="{{ $data->title }}" 
                                   class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" 
                                      class="form-control" required>{{ $data->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Current Image</label><br>
                            <img src="{{ asset($data->image) }}" 
                                 width="120" class="img-thumbnail">
                        </div>

                        <div class="form-group">
                            <label>Change Image (Optional)</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <button class="btn btn-primary">Update</button>
                        <a href="{{ route('facilities.index') }}" class="btn btn-secondary">Back</a>

                    </form>

                </div>
            </div>

        </div>
    </section>

</div>

@endsection
