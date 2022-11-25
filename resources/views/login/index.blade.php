@extends('layouts.main')

@section('container')
{{-- LOGIN --}}
<section class="vh-100 gradient-custom login">
    <div class="background"></div>
    
    <div class="container py-5 h-50">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
                {{-- Menampilkan alert bahawa user berhasil registrasi --}}
                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- Menampilkan alert bahawa user gagal login --}}
                    @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif


              <form action="/login" method="post">
                <div class="mb-md-5 mt-md-4">
                  <div class="mb-4">
                    <img src="/img/logo1.png" width="100" alt="TitiKoma" class="img-fluid">
                  </div>
                  <h2 class="fw-bold mb-2 text-uppercase">Please login</h2>
                  @csrf
                  <div class="input-group form-outline form-white mb-4">
                    <input type="text" name="username" class="form-control form-control-lg @error('username') is-invalid @enderror" id="username" placeholder="Username" autofocus required>
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>

                  <div class="input-group form-outline form-white mb-4">
                    <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Password" required>
                  </div>

                  <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                  <hr>
                  <p class="mb-0">Not registered? <a href="/register" class="text-white-50 fw-bold">Register</a>
                  </p>
                </div>
  
              </form>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
{{-- AKHIR --}}

{{-- LOGIN --}}


@endsection