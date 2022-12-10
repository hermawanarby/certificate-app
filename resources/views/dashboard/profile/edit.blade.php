@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Profile</h1>
    </div>

    <div class="col-lg-8">
      <div class="card">
          <div class="card-body">
              <form action="/dashboard/profile/{{ auth()->user()->id }}" method="post">
                @method('put')
                  @csrf
                  <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', auth()->user()->name) }}">
                    @error('name')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="username" class="form-label">username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" required autofocus value="{{ old('username', auth()->user()->username) }}">
                    @error('username')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label for="email" class="form-label">email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required autofocus value="{{ old('email', auth()->user()->email) }}">
                    @error('email')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                  </div>
                  
                  <button type="submit" class="btn btn-primary">Update profile</button>
              </form>
          </div>
      </div>
  </div>

@endsection