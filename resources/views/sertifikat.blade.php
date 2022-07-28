@extends('layouts.main')

@section('container')
<h1>Halaman Sertifikat</h1>

@foreach ($sertifikat as $s)
    <p>{{ $s->sertifikat_id }}</p> <br>
    <p>{{ $s->nama }}</p><br>
    <p>{{ $s->partisipan }}</p> <br>
    <p>{{ $s->tema }}</p> <br>
    <p>{{ $s->tanggal }}</p> <br>
    <hr>
@endforeach


@endsection
