@extends('layout.master')

@section('content')

<div class="content-wrapper">

    <!-- Content Header -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">

          <!-- SLIDE COUNT -->
          <div class="col-lg-3 col-12">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $slideCount }}</h3>
                <p>Total Slide</p>
              </div>
              <div class="icon">
                <i class="fas fa-images"></i>
              </div>
              <a href="{{ url('/slider') }}" class="small-box-footer">
                Kelola Slide <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <!-- TEAM COUNT -->
          <div class="col-lg-3 col-12">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $teamCount }}</h3>
                <p>Total Dosen</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="{{ url('/team') }}" class="small-box-footer">
                Kelola Dosen <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <!-- KOMPETENSI COUNT -->
          <div class="col-lg-3 col-12">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $kompetensiCount }}</h3>
                <p>Total Kompetensi</p>
              </div>
              <div class="icon">
                <i class="fas fa-briefcase"></i>
              </div>
              <a href="{{ url('/kompetensi') }}" class="small-box-footer">
                Kelola Kompetensi <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <!-- FASILITAS COUNT -->
          <div class="col-lg-3 col-12">
              <div class="small-box bg-danger">
                  <div class="inner">
                      <h3>{{ $facilitiesCount }}</h3>
                      <p>Total Fasilitas</p>
                  </div>
                  <div class="icon">
                      <i class="fas fa-building"></i>
                  </div>
                  <a href="{{ url('/facilities') }}" class="small-box-footer">
                      Kelola Fasilitas <i class="fas fa-arrow-circle-right"></i>
                  </a>
              </div>
          </div>

        </div>

        <div class="row mt-3">

          <!-- FOTO COUNT -->
          <div class="col-lg-3 col-12">
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{ $pictureCount }}</h3>
                <p>Total Foto</p>
              </div>
              <div class="icon">
                <i class="fas fa-camera"></i>
              </div>
              <a href="{{ url('/foto') }}" class="small-box-footer">
                Kelola Foto <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <!-- ALUMNI COUNT -->
          <div class="col-lg-3 col-12">
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>{{ $alumniCount }}</h3>
                <p>Total Alumni</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-graduate"></i>
              </div>
              <a href="{{ url('/alumni') }}" class="small-box-footer">
                Kelola Alumni <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <!-- PARTNER COUNT -->
          <div class="col-lg-3 col-12">
            <div class="small-box bg-dark">
              <div class="inner">
                <h3>{{ $partnerCount }}</h3>
                <p>Total Partner</p>
              </div>
              <div class="icon">
                <i class="fas fa-handshake"></i>
              </div>
              <a href="{{ url('/partner') }}" class="small-box-footer">
                Kelola Partner <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <!-- SLIDE COUNT -->
          <!-- BERITA -->
          <div class="col-lg-3 col-md-6 col-12">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $newsCount }}</h3>
                <p>Total Berita & Pemberitahuan</p>
              </div>
              <div class="icon">
                <i class="fas fa-newspaper"></i>
              </div>
              <a href="{{ url('/crud_news') }}" class="small-box-footer">
                Kelola Berita <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <!-- download -->
          <div class="col-lg-3 col-md-6 col-12">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $downloadCount }}</h3>
                <p>Total File</p>
              </div>
              <div class="icon">
                <i class="fas fa-download"></i>
              </div>
              <a href="{{ url('/downloads') }}" class="small-box-footer">
                Kelola File <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

        </div>

      </div>
    </section>

</div>

@endsection
