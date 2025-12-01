
<!DOCTYPE html>
<html lang="en">

<x-head>{{ $setting[0]->name ?? 'Website' }}</x-head>

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

    </header>
    <!-- header area end -->

    <main class="main">

     <!-- breadcrumb -->
                <div class="site-breadcrumb" style="background: url('{{ asset('assets/img/breadcrumb/Foto.jpg') }}')">
                <div class="container">
                    <h2 class="breadcrumb-title">{{$title}}</h2>
                    <ul class="breadcrumb-menu">
                        <li><a href="{{ url('/') }}">Tentang Kami</a></li>
                        <li class="active">{{$title}}</li>
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