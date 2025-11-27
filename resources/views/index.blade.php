<!DOCTYPE html>
<html lang="en">

 <x-head></x-head>

<body class="home-3">

    <!-- preloader -->
    <div class="preloader">
        <div class="loader-book">
            <div class="loader-book-page"></div>
            <div class="loader-book-page"></div>
            <div class="loader-book-page"></div>
        </div>
    </div>
    <!-- preloader end -->

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

    <main class="main">

        
                <!-- hero slider -->
        <div class="hero-section">
            <div class="hero-slider owl-carousel owl-theme">
                @foreach ($slider as $slider)
                <div class="hero-single" style="background: url('/assets/img/sliders/{{$slider['img']}}')">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-12 col-lg-7">
                                <div class="hero-content">
                                    <h6 class="hero-sub-title" data-animation="fadeInDown" data-delay=".25s">
                                        <i class="far fa-book-open-reader"></i>{{$slider['head']}}
                                    </h6>
                                    <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                                        {{$slider['title']}}
                                    </h1>
                                    <p data-animation="fadeInLeft" data-delay=".75s">
                                        {{$slider['description']}}
                                    </p>
                                    <div class="hero-btn" data-animation="fadeInUp" data-delay="1s">
                                        <a href="{{$slider['link1']}}" class="theme-btn">{{$slider['button1']}}<i
                                                class="fas fa-arrow-right-long"></i></a>
                                        <a href="{{$slider['link2']}}" class="theme-btn theme-btn2">{{$slider['button2']}}<i
                                                class="fas fa-arrow-right-long"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- hero slider end -->
         

                <!-- feature area -->
        <div class="feature-area fa-negative">
            <div class="col-xl-9 ms-auto">
                <div class="feature-wrapper">
                    <div class="row g-4">
                        @foreach ($kopetensi as $kopetensi)
                        <div class="col-md-6 col-lg-3">
                            <div class="feature-item">
                                <span class="count">{{$kopetensi['id']}}</span>
                                <div class="feature-icon">
                                    <img src="{{ asset('assets/img/competence/' . $kopetensi->image) }}" alt="">
                                </div>
                                <div class="feature-content">
                                    <h4 class="feature-title">{{$kopetensi['title']}}</h4>
                                    <p>{{$kopetensi['description']}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- feature area end -->

        
        <div class="event-area bg py-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <div class="site-heading text-center">
                            <span class="site-title-tagline"><i class="far fa-book-open-reader"></i> Events</span>
                            <h2 class="site-title">Berita dan <span>Pengumuman</span> Terbaru</h2>
                            <p>Dapatkan update terbaru mengenai berita dan pengumuman penting yang kami sampaikan untuk Anda.
</p>
                        </div>
                    </div>
                </div>
                <div class="event-slider owl-carousel owl-theme">
                    @foreach ($news as $news)
                    <div class="event-item">
                        <div class="event-img">
                            <img src="assets/img/news/{{$news['image']}}" alt="">
                        </div>
                        <div class="event-info">
                            <div class="event-meta">
                                <span class="event-date"><i class="far fa-calendar-alt"></i>{{$news['date']}}</span>
                            </div>
                            <h4 class="event-title"><a href="/news/{{$news['id']}}">{{$news['title']}}</a></h4>
                            <p>{{ Str::limit ($news['main'],50)}}</p>
                            <div class="event-btn">
                                <a href="/news/{{$news['id']}}" class="theme-btn">Read More<i
                                        class="fas fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- event area end -->

                        <!-- course-area -->
        <div class="course-area py-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <div class="site-heading text-center">
                            <span class="site-title-tagline"><i class="far fa-book-open-reader"></i> FASILITAS</span>
                            <h2 class="site-title">PROGRAM <span>STUDI</span></h2>
                            <p>Fasilitas lengkap dan modern untuk mendukung proses belajar dan kreativitas mahasiswa.</p>

                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($fasilitas as $fasilitas)
                    <div class="col-md-6 col-lg-4">
                        <div class="course-item wow fadeInUp" data-wow-delay=".25s">
                            <div class="course-img">
                                <span class="course-tag"><i class="far fa-bookmark"></i> {{$fasilitas['type']}}</span>
                                <img src="{{ asset('assets/img/facilities/' . $fasilitas->image) }}" alt="">
                                <a href="#" class="btn"><i class="far fa-link"></i></a>
                            </div>
                            <div class="course-content">
                                <h4 class="course-title">
                                    <a href="course-single.html">{{$fasilitas['title']}}</a>
                                </h4>
                                <p class="course-text">
                                    {{$fasilitas['description']}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- course-area -->

         <!-- counter area -->
                <div class="counter-area pt-60 pb-60">
                    <div class="container">
                        <div class="row justify-content-center text-center">
                            <div class="col-lg-3 col-sm-6 mb-4">
                                <div class="counter-box">
                                    <div class="icon mb-2">
                                        <img src="assets/img/icon/course.svg" alt="">
                                    </div>
                                    <div>
                                        <span class="counter" data-count="+" data-to="500" data-speed="3000">500</span>
                                        <h6 class="title">+ Total Courses</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 mb-4">
                                <div class="counter-box">
                                    <div class="icon mb-2">
                                        <img src="assets/img/icon/graduation.svg" alt="">
                                    </div>
                                    <div>
                                        <span class="counter" data-count="+" data-to="1900" data-speed="3000">1900</span>
                                        <h6 class="title">+ Our Students</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 mb-4">
                                <div class="counter-box">
                                    <div class="icon mb-2">
                                        <img src="assets/img/icon/teacher-2.svg" alt="">
                                    </div>
                                    <div>
                                        <span class="counter" data-count="+" data-to="750" data-speed="3000">750</span>
                                        <h6 class="title">+ Skilled Lecturers</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- counter area end -->


        <!-- team-area -->
        <div class="team-area py-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <div class="site-heading text-center">
                            <span class="site-title-tagline"><i class="far fa-book-open-reader"></i> DOSEN</span>
                            <h2 class="site-title">PROGRAM <span>STUDI</span></h2>
                            <p>Menghadirkan dosen-dosen berkompeten dan berpengalaman di bidangnya, siap membimbing mahasiswa dalam studi dan penelitian.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($team as $team)
                    <div class="col-md-6 col-lg-3">
                        <div class="team-item wow fadeInUp" data-wow-delay=".25s">
                            <div class="team-img">
                                <img src="{{ asset('assets/img/teams/' . $team->image) }}" alt="thumb">
                            </div>
                            <div class="team-social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-whatsapp"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                            </div>
                            <div class="team-content">
                                <div class="team-bio">
                                    <h5><a href="teacher-single.html">{{$team['title']}}</a></h5>
                                    <span>{{$team['description']}}</span>
                                </div>
                            </div>
                            <span class="team-social-btn"><i class="far fa-share-nodes"></i></span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- team-area end -->

        <!-- gallery-area -->
        <div class="gallery-area py-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <div class="site-heading text-center">
                            <span class="site-title-tagline"><i class="far fa-book-open-reader"></i> Gallery</span>
                            <h2 class="site-title">Our Photo <span>Gallery</span></h2>
                            <p>Abadikan momen berharga dan lihat aktivitas kampus melalui galeri foto kami.</p>
                        </div>
                    </div>
                </div>
                <div class="row popup-gallery">
                    @foreach ($pictures as $pic)
                    <div class="col-md-4 wow fadeInUp" data-wow-delay=".25s">
                        <div class="gallery-item">
                            <div class="gallery-img">
                                <img src="{{ asset('assets/img/pictures/' . $pic->image) }}" alt="Gambar">
                            </div>
                            <div class="gallery-content">
                                <a class="popup-img gallery-link" href="{{ asset($pic->image) }}">
                                    <i class="fal fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
        <!-- gallery-area end -->

            <!-- alumni testimonial area -->
        <div class="testimonial-area ts-bg pt-80 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <div class="site-heading text-center">
                            <span class="site-title-tagline"><i class="far fa-book-open-reader"></i> Alumni Testimonials</span>
                            <h2 class="site-title text-white">What Our Alumni <span>Say</span></h2>
                            <p>Kenali para alumni kami yang telah berprestasi di berbagai bidang. Mereka adalah bukti nyata dari kualitas pendidikan dan pengalaman yang kami berikan.</p>

                        </div>
                    </div>
                </div>
                <div class="testimonial-slider owl-carousel owl-theme">
                    @foreach($alumni as $alumni)
                        <div class="testimonial-item">
                            <div class="testimonial-rate">
                                @for($i = 0; $i < 5; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                            </div>
                            <div class="testimonial-quote">
                                <p>{{ Str::limit ($alumni->description),30}}</p>
                            </div>
                            <div class="testimonial-content">
                                <div class="testimonial-author-img">
                                    <img src="{{ asset($alumni->image) }}" alt="{{ $alumni->name }}">
                                </div>
                                <div class="testimonial-author-info">
                                    <h4>{{ $alumni->name }}</h4>
                                    <p>{{ $alumni->jobs }}</p>
                                </div>
                            </div>
                            <span class="testimonial-quote-icon"><i class="far fa-quote-right"></i></span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- alumni testimonial area end -->


        <!-- partner area -->
            <div class="partner-area bg pt-50 pb-50">
                <div class="container">
                    <div class="partner-wrapper partner-slider owl-carousel owl-theme">
                        @foreach($partner as $partner)
                            <img src="{{ asset($partner->image) }}" alt="thumb">
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- partner area end -->


    </main>


   <x-footer></x-footer>

</body>

</html>