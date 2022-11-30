@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome back, {{ auth()->user()->name }}</h1>
    </div>

    <div class="row text-white">
        <div class="card bg-info me-4" style="width: 18rem; margin-left: 10px">
            <div class="card-body">
                <div class="card-body-icon">
                    <span style="width: 100px; height: 100px" data-feather="users"></span>
                </div>
                <h5 class="card-title">TOTAL MEMBER</h5>
                <div class="display-4">{{ $members }}</div>
                <a href="/dashboard/member" class="text-decoration-none"><p class="card-text text-white">Lihat Detail <span data-feather="chevrons-right"></span></p></a>
            </div>
        </div>

        <div class="card bg-success me-4" style="width: 18rem; margin-left: 10px">
            <div class="card-body">
                <div class="card-body-icon">
                    <span style="width: 100px; height: 100px" data-feather="award"></span>
                </div>
                <h5 class="card-title">TOTAL TEMA</h5>
                <div class="display-4">8</div>
                <a href="#" class="text-decoration-none"><p class="card-text text-white">Lihat Detail <span data-feather="chevrons-right"></span></p></a>
            </div>
        </div>

        <div class="card bg-danger" style="width: 18rem; margin-left: 10px">
            <div class="card-body">
                <div class="card-body-icon">
                    <span style="width: 100px; height: 100px" data-feather="users"></span>
                </div>
                <h5 class="card-title">LOREM IPSUM</h5>
                <div class="display-4">10</div>
                <a href="#" class="text-decoration-none"><p class="card-text text-white">Lihat Detail <span data-feather="chevrons-right"></span></p></a>
            </div>
        </div>

    </div>


@endsection