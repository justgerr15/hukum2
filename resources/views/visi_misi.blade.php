<x-about-us-layout>
<x-slot:title>{{$title}}</x-slot>
@foreach ($deskripsi as $deskripsi)
    <h2>{{$deskripsi['judul']}}</h2>
    <p>{{$deskripsi['isi']}}</p>
    <br>
    @endforeach
</x-about-us-layout>