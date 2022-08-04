@extends('layouts.main')

@section('container')
<h1>Halaman Sertifikat</h1>
<hr>
@isset($sertifikat)
@if($sertifikat->count() < 1)
    <h3>The Certificate ID You Entered is Invalid</h3>
@endif
@foreach ($sertifikat as $s)
    <p>{{'ID Setifikat: ' .  $s->sertifikat_id }}</p> <br>
    <p>{{'Nama: ' . $s->nama }}</p><br>
    <p>{{'Partisipan: ' . $s->partisipan }}</p> <br>
    <p>{{'Tema: ' . $s->tema }}</p> <br>
    <p>{{'Tanggal: ' . $s->tanggal }}</p> <br>
@endforeach
@endisset


@endsection
