        <div class="main-navigation">
            <nav class="navbar navbar-expand-lg">
                <div class="container position-relative">
                    <a class="navbar-brand" href="https://nusanipa.ac.id">
                        <img src="{{ asset('assets/img/logo/logo2.png') }}" alt="logo">
                    </a>
                    <div class="mobile-menu-right">
                        <div class="search-btn">
                            <button type="button" class="nav-right-link search-box-outer"><i
                                    class="far fa-search"></i></button>
                        </div>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-mobile-icon"><i class="far fa-bars"></i></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="main_nav">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="/">Halaman Utama</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle active" href="#" data-bs-toggle="dropdown">Tentang Kami</a>
                                <ul class="dropdown-menu fade-down">
                                    <li><a class="dropdown-item" href="/about_us/visi_misi">Visi dan Misi</a></li>
                                    <li><a class="dropdown-item" href="/struktur">Struktur Organisasi</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="https://jurnal.nusanipa.ac.id/index.php/judexnipa">E-Jurnal</a></li>
                        </ul>
                        <div class="nav-right">
                            <div class="nav-right-btn mt-1">
                                <a href="/login" class="theme-btn"><span
                                        class="fal fa-user"></span>Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>