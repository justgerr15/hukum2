@extends('layout.master')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container">
            <h3><b>DATA PARTNER</b></h3>
        </div>
    </section>

    <section class="content">
        <div class="container">

            <div class="mb-3 d-flex justify-content-between align-items-center">
                <a href="{{ route('partner.create') }}" class="btn btn-success">+ Tambah Partner</a>
                @if(session('success'))
                    <div class="alert alert-success mb-0">{{ session('success') }}</div>
                @endif
            </div>

            <div class="row g-3">
                @foreach($partners as $partner)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ asset($partner->image) }}" class="card-img-top img-fluid" alt="Partner" style="height: 180px; object-fit: cover;">
                            <div class="card-body text-center">
                                <a href="{{ route('partner.edit', $partner->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                                <form action="{{ route('partner.destroy', $partner->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus partner ini?')">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

</div>
@endsection
