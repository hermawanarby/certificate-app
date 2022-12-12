@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Selamat Datang, {{ auth()->user()->name }}</h1>
    </div>

    <div class="row text-white mb-5">
        <div class="card bg-info me-4" style="width: 18rem; margin-left: 10px">
            <div class="card-body">
                <div class="card-body-icon">
                    <span style="width: 100px; height: 100px" data-feather="users"></span>
                </div>
                <h5 class="card-title">TOTAL MEMBER</h5>
                <div class="display-4">{{ $members }}</div>

                @can('admin')
                <a href="/dashboard/certificates" class="text-decoration-none"><p class="card-text text-white">Lihat Detail <span data-feather="chevrons-right"></span></p></a>
                @endcan
            </div>
        </div>

        <div class="card bg-success me-4" style="width: 18rem; margin-left: 10px">
            <div class="card-body">
                <div class="card-body-icon">
                    <span style="width: 100px; height: 100px" data-feather="award"></span>
                </div>
                <h5 class="card-title">TOTAL TEMA</h5>
                <div class="display-4">{{ $tema }}</div>

                @can('admin')
                <a href="/dashboard/certificates" class="text-decoration-none"><p class="card-text text-white">Lihat Detail <span data-feather="chevrons-right"></span></p></a>
                @endcan
            </div>
        </div>

        <div class="card bg-danger" style="width: 18rem; margin-left: 10px">
            <div class="card-body">
                <div class="card-body-icon">
                    <span style="width: 100px; height: 100px" data-feather="map"></span>
                </div>
                <h5 class="card-title">TOTAL LOKASI</h5>
                <div class="display-4">{{ $lokasi }}</div>

                @can('admin')
                <a href="/dashboard/certificates" class="text-decoration-none"><p class="card-text text-white">Lihat Detail <span data-feather="chevrons-right"></span></p></a>
                @endcan
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-8">
            <h4><span data-feather="file-text" style="width: 21px; height: 21px"></span> Data Terbaru</h4>
            <hr>
            <table class="table">
                @can('admin')
                <caption><a href="/dashboard/certificates" class="link-secondary text-decoration-none">Lihat detail <span data-feather="chevrons-right"></a></caption>
                @endcan
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID Sertifikat</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tema</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                @foreach ($certificates as $certificate)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $certificate->sertifikat_id }}</td>
                    <td>{{ $certificate->nama }}</td>
                    <td>{{ $certificate->tema }}</td>
                  </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-4">
            <h4><span data-feather="calendar" style="width: 21px; height: 21px"></span> Tanggal</h4>
            <hr>
            <h2 class="mt-5">{{ $date->translatedFormat('l, d F Y'); }}</h2>
        </div>
    </div>


@endsection