<x-news-layout>

            <!-- research single -->
        <div class="research-single-area py-20">
    <div class="container">
        <div class="research-single-wrapper">
            <div class="row">
                <div class="col-xl-8 col-lg-8">

                    <div class="research-details">

                        {{-- GAMBAR BERITA --}}
                        <div class="research-details-img mb-30">
                            <img src="{{ asset('assets/img/news/' . $post->image) }}" alt="thumb">
                        </div>

                        {{-- JUDUL BERITA --}}
                        <h3 class="mb-20">{{ $post->title }}</h3>

                        {{-- TANGGAL BERITA --}}
                        <p class="text-muted mb-20">
                            <i class="far fa-calendar"></i>
                            {{ \Carbon\Carbon::parse($post->date)->format('d M Y') }}
                        </p>

                        {{-- ISI BERITA --}}
                        <div class="research-details">
                            {!! $post->main !!}
                        </div>

                    </div>

                </div>
                        <div class="col-xl-4 col-lg-4">
    <div class="research-sidebar">
        <div class="widget category">
            <h4 class="widget-title">Berita dan Pengumuman Terbaru</h4>
            <div class="category-list">
                @foreach ($news as $item)
                    <a href="/news/{{ $item->id }}">
                        <i class="far fa-long-arrow-right"></i>
                        {{ Str::limit($item->title, 20) }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

                    </div>
                </div>
            </div>
        </div>
        <!-- research single end-->

</x-news-layout>