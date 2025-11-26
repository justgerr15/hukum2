  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('AdminLTE/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{config('app.name')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('AdminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
           <a href="/dashboard" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/visimisi" class="nav-link {{ request()->is('visi_misi') ? 'active' : '' }}">
              <i class="nav-icon fas fa-info-circle"></i>
              <p>
                Tentang Kami
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="/slider" class="nav-link {{ request()->is('slider') ? 'active' : '' }}">
              <i class="nav-icon fas fa-images"></i>
              <p>
                Slider
              </p>
            </a>
          </li>
                    <li class="nav-item">
            <a href="/news" class="nav-link {{ request()->is('news') ? 'active' : '' }}">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Berita & Pengumuman
              </p>
            </a>
          </li>
                    <li class="nav-item">
            <a href="/kopetensi" class="nav-link {{ request()->is('kopetensi') ? 'active' : '' }}">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                kopetensi
              </p>
            </a>
          </li>
                    <li class="nav-item">
            <a href="/facilities" class="nav-link {{ request()->is('facilities') ? 'active' : '' }}">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Fasilitas
              </p>
            </a>
          </li>
                    <li class="nav-item">
            <a href="/team" class="nav-link {{ request()->is('team') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Dosen
              </p>
            </a>
          </li>
                    <li class="nav-item">
            <a href="/pictures" class="nav-link {{ request()->is('pictures') ? 'active' : '' }}">
              <i class="nav-icon fas fa-images"></i>
              <p>
                Foto
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="/alumni" class="nav-link {{ request()->is('alumni') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                Testimoni Alumni
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="/partner" class="nav-link {{ request()->is('partner') ? 'active' : '' }}">
              <i class="nav-icon fas fa-handshake"></i>
              <p>
                Partner
              </p>
            </a>
          </li>
              <li class="nav-item">
            <a href="/logout" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>