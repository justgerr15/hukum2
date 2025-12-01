    <x-head :setting="$setting"/>

        <header class="header">

        <div class="header-top">
            <x-sub-header :setting="$setting"/>
    </header>

            <!-- preloader -->
    <div class="preloader">
        <div class="loader-book">
            <div class="loader-book-page"></div>
            <div class="loader-book-page"></div>
            <div class="loader-book-page"></div>
        </div>
    </div>
    <!-- preloader end -->

    <x-navbar :setting="$setting"/>

<x-about-us-layout>

<x-head :setting="$setting" />

<x-slot:title>{{$title}}</x-slot>

@foreach($deskripsi as $item)
    <h3>{{ $item->judul }}</h3>
    <br>
    {!! $item->isi !!}
@endforeach

</x-about-us-layout>
