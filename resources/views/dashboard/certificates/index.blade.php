@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Certificates</h1>
    </div>

    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    
    {{-- FITUR IMPORT --}}
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card mb-5">
          <div class="card-body">
            <form action="{{ route('certificate.import_data') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-6">
                    <label for="my_file" class="form-label">Xls, xlsx or csv</label>
                    <input type="file" name="my_file" id="my_file" class="form-control @error('my_file') is-invalid @enderror">
                    @error('my_file')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="fungsi" class="form-label">Fungsi</label>
                    <select name="fungsi" id="fungsi" class="form-select @error('fungsi') is-invalid @enderror">
                        <option selected hidden disabled>Pilih Fungsi</option>
                        <option value="1">Hapus & Buat Baru</option>
                        <option value="2">Tambahkan</option>
                    </select>
                    @error('fungsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="d-grid mt-3">
                    <button class="btn btn-primary">Upload File</button>
                </div>
              </div>
            </form>
            
            <form action="{{ route ('certificate.truncate') }}" method="post">
              @csrf
              <div class="d-grid mt-3 mb-3">
                  <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin mau hapus semua data ini?')">Delete All</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    {{-- AKHIR FITUR IMPORT --}}

    <div class="table-responsive">
      <div class="row" style="margin-right: 0">
        <div class="col mt-3">
          <a href="/dashboard/certificates/create" class="btn btn-primary btn-sm mb-3"><span data-feather="plus"></span> Tambah data sertifikat</a>
        </div>
        <div class="col-md-3">
          <form action="/dashboard/certificates" method="GET">
            <div class="input-group input-group-sm mb-3 mt-3">
              <input type="text" name="search" class="form-control" placeholder="Cari...">
              <button class="btn btn-primary" type="submit"><span data-feather="search"></span></button>
            </div>
          </form>
        </div>
      </div>


      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">ID Sertifikat</th>
            <th scope="col">Nama</th>
            <th scope="col">Lokasi</th>
            <th scope="col">Tema</th>
            <th scope="col" class="col-lg-2">Tanggal</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($certificates as $index => $certificate)
          <tr>
            <td>{{ $index + $certificates->firstItem() }}</td>
            <td>{{ $certificate->sertifikat_id }}</td>
            <td>{{ $certificate->nama }}</td>
            <td>{{ $certificate->lokasi }}</td>
            <td>{{ $certificate->tema }}</td>
            <td>{{ date('d F Y', strtotime($certificate->tanggal)); }}</td>
            <td>
              <a href="/dashboard/certificates/{{ $certificate->id }}/edit" class="badge bg-success text-decoration-none link-light"><span data-feather="edit"></span> Edit</a>
              <form action="/dashboard/certificates/{{ $certificate->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Yakin mau hapus data ini?')"><span data-feather="x-circle"></span> Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>

      </table>
      {{ $certificates->links() }}
    </div>
@endsection