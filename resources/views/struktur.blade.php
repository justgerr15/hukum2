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
<x-slot:title>{{$title}}</x-slot>
        <img src="assets/img/struktur/struktur.jpg" alt="logo">
</x-about-us-layout>