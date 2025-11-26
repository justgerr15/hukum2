<!DOCTYPE html>
<html lang="en">

<x-head></x-head>

<body>

    <!-- preloader -->
    <div class="preloader">
        <div class="loader-book">
            <div class="loader-book-page"></div>
            <div class="loader-book-page"></div>
            <div class="loader-book-page"></div>
        </div>
    </div>
    <!-- preloader end -->


    <!-- header area -->
    <header class="header">

        <div class="header-top">
            <div class="container">
                <div class="header-top-wrap">
                    <div class="header-top-left">
                    </div>
                    <div class="header-top-right">
                        <div class="header-top-contact">
                            <ul>
                                <li>
                                    <a href="#"><i class="far fa-location-dot"></i> Jln. Kesehatan, No.3, Maumere</a>
                                </li>
                                <li>
                                    <a href="mailto:info@example.com"><i class="far fa-envelopes"></i> informasi@nusanipa.ac.id</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-nav-bar></x-nav-bar>
    </header>
    <!-- header area end -->

    <main class="main">

    
         <!-- breadcrumb -->
                <div class="site-breadcrumb" style="background: url('{{ asset('assets/img/breadcrumb/Foto.jpg') }}')">
                <div class="container">
                    <h2 class="breadcrumb-title">Berita dan Pengumuman</h2>
                    <ul class="breadcrumb-menu">
                        <li><a href="{{ url('/') }}">Post</a></li>
                        <li class="active">Berita dan Pengumuman</li>
                    </ul>
                </div>
            </div>

        <!-- breadcrumb end -->
      
        <!-- athletic -->
        <div class="athletic py-120">
            <div class="container">
                <div class="athletic-content">
                    {{$slot}}
                </div>
            </div>
        </div>
        <!-- athletic end -->

    </main>



   <x-footer></x-footer>


    <!-- js -->
    <script src="{{asset('assets/js/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset('assets/js/modernizr.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.appear.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/counter-up.js')}}"></script>
    <script src="{{asset('assets/js/wow.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>