@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Profile</h1>
    </div>

    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="col">
        <a href="/dashboard/profile/{{ auth()->user()->id }}/edit" class="btn btn-warning btn-sm mb-3"><span data-feather="edit"></span> Edit Profile</a>
    </div>

    @foreach ($profiles as $profile)
    <div class="card" style="width: 18rem;">
        <div class="card-header fs-6">
          Profile
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item fs-6 fw-semibold">Name : {{ $profile->name }} </li>
          <li class="list-group-item fs-6 fw-semibold">Username : {{ $profile->username }} </li>
          <li class="list-group-item fs-6 fw-semibold">Email : {{ $profile->email }} </li>
        </ul>
    </div>
    @endforeach
@endsection