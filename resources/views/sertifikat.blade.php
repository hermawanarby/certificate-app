@extends('layouts.main')

@section('container')
<h1>Halaman Sertifikat</h1>
@isset($sertifikat)
@if($sertifikat->count() < 1)
    <h3>The Certificate ID You Entered is Invalid</h3>
@endif
@foreach ($sertifikat as $s)
    <p>{{ $s->sertifikat_id }}</p> <br>
    <p>{{ $s->nama }}</p><br>
    <p>{{ $s->partisipan }}</p> <br>
    <p>{{ $s->tema }}</p> <br>
    <p>{{ $s->tanggal }}</p> <br>
    <hr>
@endforeach
@endisset


@endsection
