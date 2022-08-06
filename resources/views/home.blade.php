@extends('layouts.main')

@section('container')
<h1 class="mb-4 text-center">Verify a Certificate</h1>

<div class="row justify-content-center">
    <div class="col-md-6">
        <form action="/sertifikat" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Enter Certificate ID" name="search" required>
                <button class="btn btn-primary" type="submit">VALIDATE</button>
            </div>
        </form>
    </div>
</div>

@endsection
