@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Certificates</h1>
    </div>

    <div class="table-responsive">
      <a href="/dashboard/certificates/create" class="btn btn-success btn-sm mb-3"><span data-feather="plus"></span> Tambah data sertifikat</a>
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">ID Sertifikat</th>
            <th scope="col">Nama</th>
            <th scope="col">Partisipan</th>
            <th scope="col" class="col-lg-4">Tema</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($certificates as $certificate)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $certificate->sertifikat_id }}</td>
            <td>{{ $certificate->nama }}</td>
            <td>{{ $certificate->partisipan }}</td>
            <td>{{ $certificate->tema }}</td>
            <td>{{ $certificate->tanggal }}</td>
            <td>
              <a href="#" class="badge bg-primary text-decoration-none link-light"><span data-feather="edit"></span> Edit</a>
              <a href="#" class="badge bg-danger text-decoration-none link-light"><span data-feather="x-circle"></span> Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
@endsection