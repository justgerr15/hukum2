@extends('layout.master')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h3><b>DATA SLIDER</b></h3>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <a href="{{ route('slider.create') }}" class="btn btn-success mb-3">
                <i class="fas fa-plus"></i> Tambah Slider
            </a>

            <div class="card">
                <div class="card-body table-responsive">

                    <table class="table table-bordered table-hover text-center">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>No</th>
                                <th>Mini Title</th>
                                <th>Main Title</th>
                                <th>Description</th>
                                <th>Button 1</th>
                                <th>Button 2</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($slider as $i => $s)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $s->head }}</td>
                                <td>{{ $s->title }}</td>
                                <td>{{ $s->description }}</td>
                                <td>{{ $s->button1 }}</td>
                                <td>{{ $s->button2 }}</td>

                                <td>
                                    <img src="{{ asset('assets/img/sliders/' . $s->img) }}"
                                         width="120"
                                         style="border-radius:5px;">
                                </td>

                                <td>
                                    <a href="{{ route('slider.edit', $s->id) }}"
                                       class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('slider.destroy', $s->id) }}"
                                          method="POST"
                                          style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Hapus slider ini?')">
                                            <i class="fas fa-trash"></i>
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
    </section>
</div>

@endsection
