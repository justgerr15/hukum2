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
                
                <h3 class="card-title"><b>Website Setting</b></h3>

                <a href="{{ route('setting.edit', $setting->id) }}" 
                   class="btn btn-primary btn-sm float-right">
                    Edit Setting
                </a>

              </div>

              <div class="card-body">

                <table class="table table-bordered table-hover">
                    <tbody>

                        <tr>
                            <th width="200px">Name</th>
                            <td>{{ $setting->name }}</td>
                        </tr>

                        <tr>
                            <th>Address</th>
                            <td>{{ $setting->address }}</td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td>{{ $setting->email }}</td>
                        </tr>

                        <tr>
                            <th>Favicon</th>
                            <td>
                                @if($setting->favicon)
                                    <img src="{{ asset('upload/setting/'.$setting->favicon) }}" 
                                         width="40" class="img-thumbnail">
                                @else
                                    <span class="text-muted">Belum diupload</span>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th>Logo</th>
                            <td>
                                @if($setting->logo)
                                    <img src="{{ asset('upload/setting/'.$setting->logo) }}" 
                                         width="120" class="img-thumbnail">
                                @else
                                    <span class="text-muted">Belum diupload</span>
                                @endif
                            </td>
                        </tr>

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
