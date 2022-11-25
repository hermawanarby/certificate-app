@extends('layouts.main')


@section('container')


{{-- REGISTER --}}
<section class="vh-100 gradient-custom login">

    <div class="container py-5 h-50">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">

                    <main class="form-registation">
                        <form action="/register" method="post">
                            @csrf
                            <div class="mb-md-5 mt-md-4">
                                <div class="mb-4">
                                </div>
                                <h2 class="fw-bold mb-2 text-uppercase mb-4">Register Form</h2>
                                
                                <div class="input-group form-outline form-white mb-4">
                                    <input type="text" name="name" class="form-control form-control-lg rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Name" value="{{ old('name') }}" required>
                                    {{-- <label for="name">Name</label> --}}
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="input-group form-outline form-white mb-4">
                                    <input type="text" name="username" class="form-control form-control-lg  @error('username') is-invalid @enderror" id="username" placeholder="Username" value="{{ old('username') }}" required>
                                    {{-- <label for="username">Username</label> --}}
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="input-group form-outline form-white mb-4">
                                    <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                                    {{-- <label for="email">Email</label> --}}
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="input-group form-outline form-white mb-4">
                                    <input type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                                    {{-- <label for="password">Password</label> --}}
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="input-group form-outline form-white mb-4">
                                    <input type="password" name="password_confirmation" class="form-control form-control-lg rounded-bottom @error('password') is-invalid @enderror" id="password_confirmation" placeholder="Confirm Password" required>
                                    {{-- <label for="password_confirmation">Confirm Password</label> --}}
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
            
                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Register</button>
                                <hr>
                                <p class="mb-0">Already registered? <a href="/login" class="text-white-50 fw-bold">Login</a>
                                </p>
                            </div>
                        </form>
                    </main>
                    
                </div>
            </div>
        </div>
        </div>
    </div>
</section>
{{-- REGISTER AKHIR --}}


@endsection