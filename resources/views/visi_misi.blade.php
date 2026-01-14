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

    <x-nav-bar :setting="$setting"/>

<x-about-us-layout>

<x-head :setting="$setting" />

<x-slot:title>{{$title}}</x-slot>

@foreach($deskripsi as $item)
    <h3><center>{{ $item->judul }}</center></h3>
    <br>
    {!! $item->isi !!}
    <br>
   <br>
@endforeach

</x-about-us-layout>
